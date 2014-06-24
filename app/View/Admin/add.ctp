<?php echo $this->Html->script('/ckeditor/ckeditor.js'); ?>
<?php echo $this->Html->css('admin/add.css'); ?>

<?php 
echo $this->Form->create('Post', array(
	'url' => array('controller' => 'admin', 'action' => 'add'),
	'inputDefaults' => array(
        'label' => false
    )
));

echo $this->Form->input('title', array('type' => 'text', 'placeholder' => 'Tytuł'));
echo $this->Form->input('body', array('type' => 'textarea', 'placeholder' => 'Treść'));
echo $this->Form->button('Send', array('type' => 'submit'));

echo $this->Form->end(); ?>

<script>
    CKEDITOR.replace('PostBody');
</script>