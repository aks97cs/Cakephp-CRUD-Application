<?= $this->Form->create("Users",array("url"=>"/users/add")) ?>
<?= $this->Form->input("username") ?>
<?= $this->Form->input("password") ?>
<?= $this->Form->button("submit") ?>
<?= $this->Form->end() ?>