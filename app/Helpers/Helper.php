<?php

namespace App\Helpers;

class Helper
{
    public static function remove_empty_itens_array($input, $reindex = false) {
		if(is_array($input)){
			$non_empty_items = array();
			foreach ($input as $key => $value) {
				if(is_array($value)){
					$temp = self::remove_empty_itens_array($value);
					if($temp !== null && $temp !== '' && !empty($temp)){
						$non_empty_items[$key] = $temp;
					}
				}else{
					if($value !== null && $value !== ''){
						$non_empty_items[$key] = $value;
					}
				}
			}
            if($reindex){
                $input = array_values($non_empty_items);
            }else{
                $input = $non_empty_items;
            }
        }
        
		return $input;
	}
}
