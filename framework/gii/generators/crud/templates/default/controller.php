<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends DefaultController
{
        public $modelName = '<?php echo $this->modelClass; ?>';
        public $admin = true;
        //public $layout = 'back';
        public $createRedirect = array('/<?php echo strtolower($this->modelClass); ?>/admin');
        public $updateRedirect = array('/<?php echo strtolower($this->modelClass); ?>/admin');
}
