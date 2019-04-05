<?php
	function menuParent($data,$parent,$str=''){
     	foreach($data as $item){
     		if ($item->parent_id == $parent){
	     		echo '<option value="'.$item->id.'">' .$str.$item->name. '</option>';
	     		menuParent($data,$item->id,$str.'===|||');
     		}
     	}
  	}

  	function ListMenu($data,$parent,$str='') {
  		foreach ($data as $item) {
  			if ($item->parent_id == $parent) {
				$urlEdit = asset('admin/categories/'.$item->id.'/edit');
           		$urlDel = asset('admin/categories/'.$item->id.'/del');
				echo "<tr>";
     	 		echo "<td>".$str.$item->name."</td>";
              	echo "<td><a class='btn btn-warning' href='$urlEdit'>Edit</a></td>";
              	echo "<td>
              			<a class='btn btn-danger' data-id='$item->id'>Delete</a>
              		</td>";
              	echo "</tr>";
              	ListMenu($data,$item->id,$str.'===|||');
  			}
  		}
  	}

  	function MenuEdit($data,$category,$parent,$str='') {
  		foreach ($data as $val) {
  			if($val->parent_id == $parent){
  				if($val->id == $category->parent_id){
  					echo "<option value='".$val->id."' selected>".$str.$val->name."</option>";
  				}else{
	                echo "<option value='".$val->id."'>".$str.$val->name."</option>";
  				}
	                MenuEdit($data,$category,$val->id,$str.'===|||');
             }
  		}
  	}

    function MenuView($categories,$id) {
      foreach ($categories as $abc ) {
        if ($abc->parent_id === $id) {
          // echo '<li><a href="#">'.$abc->name.'</a></li>';
          return '<li class="drop-down"><a href="#!">'.$abc->name.'<i class="ion-ios-arrow-right"></i></a>'.
                  '<ul class="drop-down-menu drop-down-inner">'.
                      MenuView($categories,$abc->id).
                  '</ul>'.
                '</li>';
          // MenuView($categories,$abc->id);
        }
      }
    }
 ?>
