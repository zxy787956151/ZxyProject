<?php
	Class ArticleAction extends Action {

		Public function index() {

			$this->article = M('article')->select();

			$this->display();

		}

		Public function addArticle() {

			$this->display();
			
		}

		Public function RunaddArticle() {

			$article = M('article');
			$data = array(
					'uid' => $_POST['article_uid'],
					'imgname' => '',
					'title' => $_POST['article_title'],
					'content' => $_POST['article_content'],
					'category' => $_POST['article_category'],
					'time' => time(),
					'discuss' => '',
					'browse' => '',
				);
			if($pd = $article->data($data)->add()) {
				$this->success("添加轮播项成功!","__GROUP__/Article/index");
			}
		}


	}
 ?>