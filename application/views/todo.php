<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!empty($_POST['btn_submit'])) {
    header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
    <title>TODOリスト</title>
</head>
<body>
<div id="app">
    <header class="navbar is-info is-mobile">
        <div class="navbar-brand">
            <span class="navbar-item">
                <span class="is-size-4">TODOリスト</span>
            </span>
        </div>
        <div class="navbar-end">
            <span class="navbar-item">
                <span class="is-size-6">タスク管理が出来るWEBアプリです</span>
            </span>
        </div>
    </header>

    <div class="form-wrapper columns is-centered">
        <?php echo form_open('todo/insert', array('id'=>'form')); ?>
            <div class="column">
                <input id="task" name="task" class="input is-four-fifths" type="text" maxlength="70" placeholder="タスク" required>
                <button type="submit" id="form-btn" class="button is-info is-light">追加</button>
            </div>
        </form>
    </div>

    <hr>

    <div class="table-wrapper columns is-centered">
        <div class="table-body">
            <table class="table column">
                <tr>
                    <th>タスク</th>
                    <th class="has-text-centered">-</th>
                </tr>
                <?php foreach($todo as $todo_task): ?>
                <tr>
                    <td><p><?php echo $todo_task['task']; ?></p></td>
                    <input type="hidden" id="" value="<?php echo $todo_task['task']; ?>">
                    <td>
                        <a id="edit_btn" class="button is-warning is-light" href="<?php echo site_url('edit/'.$todo_task['id']); ?>">編集</button>
                        <a id="delete_btn" class="button is-danger is-light" href="<?php echo site_url('delete/'.$todo_task['id']); ?>">削除</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</div>
</body>
</html>