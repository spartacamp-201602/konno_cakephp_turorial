<?php


// コントローラ ... クラスの中でも XXXXControllerと定義されている

// アクション ... XXXXXControllerの中に定義されている
class PostsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function index() {
        // $this->setすることによって
        // Viewの中で下記のように変数が使えるようになる。
        /* <?php echo $posts ?> */
        $options = array('limit' => 3);
        $this->set('posts', $this->Post->find('all', $options));
    }

    // メソッドの中に $id を定義すると
    // URLの終端に記載されたIDのデータが取得できる
    // 例: /posts/show/123 => $id の中身が 123 と代入される
    public function show($id) {
        // select文を実行するのと同等の処理が行われる
        $post = $this->Post->findById($id);
        // View側で使えるように結果をセットする
        $this->set('post', $post);
    }
}