<?php

namespace Controller;
use Model\Subject;
use Model\Topic;

class TopicController extends BaseController
{
    public $middleware = [
        'get' => [],
        'post' => [],
        'all' => [
            'Middleware\AuthMiddleware'
        ]
    ];

    public function get()
    {
        $page_name = "Câu hỏi - chủ đề";
        require(view_url("topic"));
        exit(0);
    }

    public function post()
    {
        $cmd = $_POST['cmd'];

        if ($cmd == 'addSubject') {
            $status = Subject::insert([
                'name' => $_POST['name'],
                'user_id' => $_SESSION['user_id']
            ]);
            echo \json_encode($status);
        }

        else if ($cmd == 'getListSubject') {
            $list = Subject::where('user_id', '=', $_SESSION['user_id'])->get();
            echo \json_encode($list);
        }

        else if ($cmd == 'delete') {
            $result = Subject::where('user_id', '=', $_SESSION['user_id'])
                ->where('id', '=', $_POST['id'])->delete();
            echo \json_encode($result);
        }

        else if ($cmd == 'update') {
            $result = Subject::where('user_id', '=', $_SESSION['user_id'])
            ->where('id', '=', $_POST['id'])->update(['name'=>$_POST['name']]);
            echo \json_encode($result);
        }

        else if ($cmd == 'addTopic') {
            $subject = Subject::getById($_POST['subjectId']);
            if ($subject['user_id'] != $_SESSION['user_id']) {
                echo \json_encode(false);
                exit(0);
            }
            $status = Topic::insert([
                'name' => $_POST['name'],
                'subject_id' => $_POST['subjectId']
            ]);
            echo \json_encode($status);
        }

        else if ($cmd == 'getListTopic') {
            if ($_POST['subjectId'] == 'all') {
                $topic = Topic::rawQuery(
                    'select t.id, t.name, s.name as sname from topics t left join subjects s on t.subject_id=s.id where user_id='.$_SESSION['user_id']." order by id"
                );
            }
            else {
                $topic = Topic::rawQuery(
                    "select t.id, t.name, s.name as sname from topics t left join subjects s on t.subject_id=s.id where subject_id=$_POST[subjectId] and user_id=".$_SESSION['user_id']." order by id"
                );
            }
            echo \json_encode($topic);
        }
    }
}
