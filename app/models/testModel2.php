<?php
class testModel2 extends Model
{
   public function func3()
   {
      $this->insert('resources', ['name' => "Test2", 'quantity' => 10]);
   }

   public function func4()
   {
      $this->insert('resources', ['name' => "Test2", 'quantity' => 4]);
   }
}
