<?php

class Task extends AppModel
{

    public $hasMany = array('Note');

    //この中にバリデーションを書く
    public $validate = array(
        //ここにルールを書いていく
        // 1) 対象となるデータは？
        // 2) どんなバリデーションをするか？
        // 3) 引っかかったらどんなメッセージをだすか？
        'name' => array(
            'rule' => array('between', 5, 30),
                'message' => 'タスクは5文字以上30文字以内で入力してください'
            ),
        'body' => array(
            'rule' => array('maxLength', 255),
            'message' => '詳細は255文字以内で入力してください'
            )
        );
}


// 今までのバリデーション

// $name = $_POST['name'];
// $errors = array();

// if ($name = "")
// {
//     $errors[] = "名前が入力されていません"
// }

// foreach ($errors as $error)
// {
//     echo $error
// }