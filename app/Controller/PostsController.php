<?php


// コントローラ ... クラスの中でも XXXXControllerと定義されている

// アクション ... XXXXXControllerの中に定義されている
class PostsController extends AppController {

    // 使用するヘルパーの記述
    public $helpers = array('Html', 'Form');

    // 使用するコンポーネントの記述
    public $components = array('Flash');

    public function index() {
        // $this->setすることによって
        // Viewの中で下記のように変数が使えるようになる。
        /* <?php echo $posts ?> */
        $options = array('limit' => 100);
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

    public function add() {

        // POSTメソッドの確認
        // if ($_SERVER['REQUEST_METHOD'] === 'POST')と同じ
        if ($this->request->is('post')) {

            // 保存処理
            // if文も追加
            if ($this->Post->save($this->request->data)) {
                // 保存に成功

                // フラッシュメッセージ（リダイレクトした直後にのみ表示される）
                $this->Flash->success('新しい記事を追加しました!');

                // リダイレクト
                return $this->redirect(array('action' => 'index'));
            } else {
                // 保存に失敗
                return $this->Flash->error('保存できませんでした...');
            }


        }
    }

    public function delete($id) {

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        // $id -> /posts/delete/5 であれば 5 が入る
        // 今まで → delete.php?id=5
        if ($this->Post->delete($id)) {
            $this->Flash->error('記事' . $id . 'を削除しました');
            return $this->redirect(array('action' => 'index'));
        }
    }
}