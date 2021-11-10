<?php
class testModel2 extends Model
{
   public function func2()
   {
      $this->insert('resources', ['name' => "Test2", 'quantity' => 4]);
   }
}
