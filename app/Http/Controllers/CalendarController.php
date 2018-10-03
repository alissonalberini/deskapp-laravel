<?php

namespace App\Http\Controllers;


use Request;
use App\User;
use App\Models\Calendar;

use Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class CalendarController extends Controller
{
    public function index()
    {
        $usuarios = User::all('name', 'id');;
        return view('calendar.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function lista(Authenticatable $usuariologado)
    {

        //TODO: pegar o mês do start que vem na chamada get da url;
        $a = Calendario::whereDate('start', '>=', date("Y-m-d", strtotime(Request::get('start'))))
            ->whereDate('start', '<=', date("Y-m-d", strtotime(Request::get('end'))))
            ->get();

        //id's únicos (não possivl vindos da união das tabelas);
        $events = array();
        $i = 1;

        foreach ($a as $row) {
            $e = array();
            $e['id'] = $i++;
            $e['title'] = $row->title;
            $e['start'] = $row->start;
            array_push($events, $e);

        }
        return json_encode($events);

    }

    public function novo()
    {
        $usuarios = User::all('name', 'id');
        return view('calendar.novo', ['usuarios' => $usuarios]);
    }

    public function adiciona()
    {
        try {
            $dados = Request::all();
            $dados['data'] = date('Y-m-d H:i', strtotime(str_replace('/', '-', $dados['data'])));
            
            Compromisso::create(array_filter($dados, "strlen"))->save();
            return json_encode([
                'sucesso' => true,
                'mensagem' => 'Compromisso criado com sucesso!'
            ]);
        } catch (QueryException $e) {
            return json_encode([
                'sucesso' => false,
                'errorcode' => $e->getCode(),
                'errormessage' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return json_encode([
                'sucesso' => false,
                'errormessage' => $e->getMessage()
            ]);
        }

        $mensagem = "Compromisso adicionado com sucesso!";

        Alert()->success($mensagem)->autoclose(2000);
        return redirect("/calendar");
    }


    public function filtrar()
    {

        $a = Compromisso::whereDate('data', '>=', date("Y-m-d", strtotime(Request::get('datas')['start'])))
            ->whereDate('data', '<=', date("Y-m-d", strtotime(Request::get('datas')['end'])))
            ->whereIn('grupo', Request::get('filtros'))
            ->get();

        $events = array();

        foreach ($a as $row) {
            $e = array();
            $e['id'] = $row->idcompromisso;
            $e['title'] = $row->texto;
            $e['start'] = $row->data;
            $e['className'] = ($row->grupo == 'Eventos' ? 'bgevento' : ($row->grupo == 'Compromissos' ? 'bgcompromisso' : 'bgentrevista'));
            array_push($events, $e);

        }

        if (in_array('Aniversariantes', Request::get('filtros'))) {

            $a = DB::table('calendar')
                ->whereDate('start', '>=', date("Y-m-d", strtotime(Request::get('datas')['start'])))
                ->whereDate('start', '<=', date("Y-m-d", strtotime(Request::get('datas')['end'])))
                ->get();

            $events2 = array();
            $i = 1;

            foreach ($a as $row) {
                $e = array();
                $e['id'] = $i++;
                $e['title'] = $row->title;
                $e['start'] = $row->start;
                array_push($events2, $e);

            }

            $events = array_merge($events,$events2);

        }

        return json_encode($events);

    }

    public function compromissos(Authenticatable $usuariologado, $tipo)
    {

        $a = Compromisso::whereDate('data', '>=', date("Y-m-d", strtotime(Request::get('start'))))
            ->whereDate('data', '<=', date("Y-m-d", strtotime(Request::get('end'))))
            ->where('grupo', $tipo)
            ->get();

        $events = array();

        foreach ($a as $row) {
            $e = array();
            $e['id'] = $row->idcompromisso;
            $e['title'] = $row->texto;
            $e['start'] = $row->data;
            array_push($events, $e);

        }
        return json_encode($events);

    }

    public function compromissosData($data)
    {
        $a = Compromisso::whereDate('data', '=', $data)
            ->get();

        $events = array();

        foreach ($a as $row) {
            $e = array();
            $e['id'] = $row->idcompromisso;
            $e['title'] = $row->texto;
            $e['start'] = date('d/m/Y H:i', strtotime($row->data));
            array_push($events, $e);

        }
        return json_encode($events);
    }

    public function aniversariosData($data)
    {
        $a = DB::table('calendar')
            ->where('start', '=', $data)
            ->get();

        $events = array();
        $i = 1;

        foreach ($a as $row) {
            $e = array();
            $e['id'] = $i++;
            $e['title'] = $row->title;
            $e['start'] = $row->start;
            array_push($events, $e);

        }
        return json_encode($events);
    }

    public function compromissosApaga($id)
    {
        Compromisso::destroy($id);
    }
}
