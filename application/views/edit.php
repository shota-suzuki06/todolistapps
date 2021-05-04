<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bulma.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
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

    <?php if($value === 'edit'): ?>
    <div class="form-wrapper columns is-centered">
        <?php echo form_open('editConfirm/', array('id'=>'form')); ?>
            <div class="column">
                <input id="task" name="task" class="input is-four-fifths" type="text" value="<?php echo $todo->task; ?>" maxlength="70" required>
                <input type="hidden" id="id" name="id" value="<?php echo $todo->id; ?>">
                <button type="submit" id="form-btn" class="button is-warning is-light">編集</button>
            </div>
        </form>
    </div>
    <?php elseif($value === 'delete'): ?>
    <div class="form-wrapper columns is-centered">
        <?php echo form_open('deleteConfirm/', array('id'=>'form')); ?>
            <div class="column">
                <input id="task" name="task" class="input is-four-fifths" type="text" value="<?php echo $todo->task; ?>"  required disabled>
                <input type="hidden" id="id" name="id" value="<?php echo $todo->id; ?>">
                <button type="submit" id="form-btn" class="button is-danger is-light">削除</button>
            </div>
            <p class="has-text-centered">こちらのタスクを削除しても良いでしょうか？</p>
        </form>
    </div>
    <?php endif; ?>
    <div class="has-text-centered">
        <a class="button" href="<?php echo site_url('/'); ?>">戻る</a>
    </div>

</div>
</body>
</html>