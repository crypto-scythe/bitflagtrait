# BitflagTrait

Simple trait for setting and getting bitflags in your classes

## Installing

Just with composer:

    composer require crypto_scythe/bitflagtrait

## Usage (similiar to examples/useracl.php)

    <?php
    
    class UserACL {
      
      use \crypto_scythe\BitflagTrait;
      
      const FLAG_CREATE = 1;
      const FLAG_READ = 2;
      const FLAG_UPDATE = 4;
      const FLAG_DELETE = 8;
      
      protected $acl = 0;
    
      public function isCreateAllowed() {
        
        return $this->isBitflagSet( $this->acl, self::FLAG_CREATE );
        
      }
    
      public function isReadAllowed() {
        
        return $this->isBitflagSet( $this->acl, self::FLAG_READ );
        
      }
    
      public function isUpdateAllowed() {
        
        return $this->isBitflagSet( $this->acl, self::FLAG_UPDATE );
        
      }
      
      public function isDeleteAllowed() {
        
        return $this->isBitflagSet( $this->acl, self::FLAG_DELETE );
        
      }
    
      public function setCreateAllowed( $value ){
        
        $this->setFlag( $this->acl, self::FLAG_CREATE, $value );
        
      }
      
      public function setReadAllowed($value) {
        
        $this->setFlag( $this->acl, self::FLAG_READ, $value );
        
      }
    
      public function setUpdateAllowed($value) {
        
        $this->setFlag( $this->acl, self::FLAG_UPDATE, $value );
        
      }
      
      public function setDeleteAllowed($value){ 
    
        $this->setFlag( $this->acl, self::FLAG_DELETE, $value );
    
      }
    
      public function __toString() {
        
        $rights = array_filter( [
            $this->isCreateAllowed() ? 'CREATE' : false,
            $this->isReadAllowed() ? ' READ' : false,
            $this->isUpdateAllowed() ? 'UPDATE' : false,
            $this->isDeleteAllowed() ? 'DELETE' : false
        ] );
        
        return print_r( $rights, true );
        
      }
      
    }
    
    $userACL = new UserACL();
    $userACL->setCreateAllowed( true );
    $userACL->setReadAllowed( false );
    $userACL->setUpdateAllowed( true );
    $userACL->setDeleteAllowed( false );
    
    echo $userACL;
