<?php


class Common_model 
{


function hotel_detail_by_name($hotel_name)
{
	$fetch_hotel_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel h')
								->join('hotel_detail hd', 'h.id = hd.hotel_id')
									->where('hotel_name=:id',array(':id'=>$hotel_name))
								->queryAll();
										
		return $fetch_hotel_detail;
}


	function fetch_package_listing()
	{
		
		$packages=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('show_on_site="Show"')
								->limit('5')
								->queryAll();
										
		return $packages;
		
	}
	
	function fetch_package_listin_based_on_categegory($name='')
	{
		
		$packages=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('category_name=:name and status="Show"',array(':name'=>$name))
								//->where('show_on_site="Show"')
								// ->order('pricing desc')
								->order('package_night asc')
								->queryAll();
										
		return $packages;
		
	}
	
	
	function package_detail($id='')
	{
		
		$package_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('packages p')
								->join('package_detail pd', 'p.id = pd.package_id')
								->where('pd.package_id=:id',array(':id'=>$id))
								
								->queryAll();
										
		return $package_detail;
		
	}
	
	
	function package_detail_itinerary($id='')
	{
		
		$package_detail_itinerary=Yii::app()->db->createCommand()
								->select('*')
								->from('packages_itinerary pi')
								->where('pi.package_detail_id=:id',array(':id'=>$id))
								->order('id asc')
								->queryAll();
										
		return $package_detail_itinerary;
		
	}
	
	
	function hotel_listing($id='')
	{
		
		$hotel_listing=Yii::app()->db->createCommand()
								->select('*')
								//->from('hotel')
								->from('hotel h')
								->join('rating r','h.rating =r.rating_name')
								->where(array('in', 'id', explode(',',$id)))
								->order('rating_value desc')
								->queryAll();
								
							
								
								
				

			
			

					
		return $hotel_listing;
		
	}
	
		
	function fetch_place_to_visit_listing($name='')
	{
		
		$place_to_visit_listing=Yii::app()->db->createCommand()
								->select('*')
								->from('place_to_visit')
								->where('category_name=:name',array(':name'=>$name))
								
								->queryAll();
										
		return $place_to_visit_listing;
		
		
	}
	
	
	function fetch_place_to_visit_detail($id='')
	{
		
		$place_to_visit_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('place_to_visit')
								->where('id=:id',array(':id'=>$id))
								
								->queryAll();
										
		return $place_to_visit_detail;
		
	}
	
		function fetch_hotel_listing()
	{
		
			$hotel_listing=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel h')
								->join('rating r','h.rating =r.rating_name')
								->order('rating_value desc')
								->queryAll();
								
								

				
		return $hotel_listing;
		
	}
	
		function hotel_listing_by_city($cityname='')
		{

		$hotel_listing=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel h')
								->join('rating r','h.rating =r.rating_name')
								->where('h.city=:cityname and show_on_site="Show"',array(':cityname'=>$cityname))
								// ->where('show_on_site="Show"')
								->order('rating_value desc')
								->queryAll();
								
								

				
		return $hotel_listing;

		}
	

	
	
		function fetch_hotel_detail($id)
	{
		
			$fetch_hotel_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel h')
								->join('hotel_detail hd', 'h.id = hd.hotel_id')
									->where('hotel_id=:id',array(':id'=>$id))
								->queryAll();
										
		return $fetch_hotel_detail;
		
	}
	
		function fetch_contact_us_detail_based_on_type($id,$type)
	{
		// echo $id;
		// echo "<br>";
		
		// echo $type;
		// // echo "<br>";exit;
		if($type=="packages" || $type=="package")
		{
		
			$detail=Yii::app()->db->createCommand()
								->select('*,p.package_name  as name')
								->from('packages p')
								//->join('package_detail pd', 'p.id = pd.package_id')
								->where('p.id=:id',array(':id'=>$id))
								
								->queryAll();
								
						
		}

	if($type=="hotel")
		{
		
			$detail=Yii::app()->db->createCommand()
								->select('*,h.hotel_name as name')
								->from('hotel h')
								//->join('hotel_detail hd', 'h.id = hd.hotel_id')
									->where('h.id=:id',array(':id'=>$id))
								->queryAll();
								
							
		}		

	
		return $detail;
		
	}
	
	
	function fetch_random_package()
	{
	
	$package_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('packages p')
								->join('package_detail pd', 'p.id = pd.package_id')
								->where('p.status="Show"')
								->order(array('RAND()'))
								->limit(1)
								->queryAll();
										
		return $package_detail;
	
	}
	
		function fetch_random_hotel()
	{
	
		$fetch_hotel_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel h')
								->join('hotel_detail hd', 'h.id = hd.hotel_id')
								->where('h.show_on_site="Show"')
								->order(array('RAND()'))
								->limit(1)
								->queryAll();
										
		return $fetch_hotel_detail;
	
	}
		function fetch_hotel_room($id)
	{
	
		$fetch_hotel_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel_room')
								->where('hotel_detail_id=:id',array(':id'=>$id))
								// ->limit(1)
								->queryAll();
										
		return $fetch_hotel_detail;
	
	}
	function fetch_admin_detail()
	{
	$admin_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('admindetail')
								->queryAll();
										
		return $admin_detail;
	
	
	}
	
	
	public function fetch_testimonial($start='',$limit='')
	{
	$testimonial=Yii::app()->db->createCommand()
								->select('*')
								->from('testimonial')
								 ->limit($limit,$start)
								->queryAll();
								
								// echo "<pre>";
								// print_r($testimonial);exit;
										
		return $testimonial;
	}
	
	public function fetch_testimonial_count()
	{
	
		$count=Yii::app()->db->createCommand()
								->select('count(id) as count')
								->from('testimonial')
								->queryAll();
								
								// echo "<pre>";
								// print_r($testimonial);exit;
										
		return $count[0]['count'];
	}
	
	function rate_and_fair_detail($id)
	{
	
	$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id and default_list="Yes"',array(':id'=>$id))
								->queryAll();
								
		// echo "<pre>";
// print_r($rate_list);exit;

return $rate_list;		
	
	}
	
	function rate_and_fair_detail_by_city_and_package($city_name,$package_id)
	{
	
	$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id and city=:city',array(':id'=>$package_id,':city'=>$city_name))
								->queryAll();
								
		// echo "<pre>";
// print_r($rate_list);exit;

return $rate_list;
	
	}
	
	function fetch_city($id)
	{
	
	$added_city  = Yii::app()->db->createCommand()
								->select('group_concat(distinct(city)) as city')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
								
								
								if(isset($added_city[0]['city']) && $added_city[0]['city']!='')
								{
								$city = explode(',',$added_city[0]['city']);
								}
								else
								{
									$city = array();
								}
	
	$city=Yii::app()->db->createCommand()
								->select('*')
								->from('city')
								->where(array('in', 'name', $city))
								->queryAll();
								
								return $city;
	
	}
	
	
	

function fetch_latest_testiminial()
{


$testimonial=Yii::app()->db->createCommand()
								->select('*')
								->from('testimonial')
								->order('id desc')
								->limit('5')
								->queryAll();
								
								return $testimonial;
	

}
	
	
}