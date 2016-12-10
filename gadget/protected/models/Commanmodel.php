<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Commanmodel 
{

	function fetch_banner()
	{
		$banner=Yii::app()->db->createCommand()
								->select('*')
								->from('banner b')
								->order(array('RAND()'))
								->limit(1)
								->queryAll();
										
		return $banner;
		
		
	}
	
	function fetch_latest_news()
	{
		$banner=Yii::app()->db->createCommand()
								->select('*')
								->from('news n')
								->order('id desc')
								->limit(10)
								->queryAll();
										
		return $banner;
		
		
	}
	
	function fetch_reviews_details($id)
	{
		$reviews = Yii::app()->db->createCommand()
								->select('*')
								->from('review r')
								
								->where('id = :id',array(':id'=>$id))	
								
								
								->queryAll();
								
								
		$end_date = date("Y-m-d H:i:s",time());
		$start_date = $reviews[0]['date_added'];		
		
		
		 $diff = abs(strtotime($end_date) - strtotime($start_date));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = (strtotime($end_date) - strtotime($start_date))/ (60*60);
		
		
		if($hours<=48)
		{
			$reviews[0]['relased_date'] =  $hours. "hrs";
		}
		else
		{
			if($days<=30)
			{
				$reviews[0]['relased_date'] =  $days. "days";
			}else
			{
				if($months<=12)
				{
					$reviews[0]['relased_date'] =  $months. "months";
				}
				else
				{
					$reviews[0]['relased_date'] =  $years. "years";
				}
			}
			
		}
		
		
		// echo "<pre>";
		// echo($years)."<br>";
		// echo($months)."<br>";
		// echo($days)."<br>";
		// echo($hours)."<br>";
		// print_r($reviews);exit;
		
		return $reviews;
		
		
	}
	
	
	function fetch_reviews($limit,$start,$id=0)
	{
		$reviews = Yii::app()->db->createCommand()
								->select('*')
								->from('review r')
								
								->where('id != :id',array(':id'=>$id))	
								
								
								->order('id desc')
								->limit($limit,$start)
								->queryAll();
		

		$reviews_count = Yii::app()->db->createCommand()
								->select('count(id) as count')
								->from('review r')
								
								->where('id != :id',array(':id'=>$id))	
								
								->queryAll();
								
		
		$data['list'] 	= $reviews;
		$data['total'] 	= $reviews_count[0]['count'];
		$data['total_page'] = ceil($reviews_count[0]['count']/16);
		return $data;
		
		
	}

	
	
	
	function fetch_news($limit,$start,$id=0)
	{
		$news = Yii::app()->db->createCommand()
								->select('*')
								->from('news n')
								
								->where('id != :id',array(':id'=>$id))	
								
								
								->order('id desc')
								->limit($limit,$start)
								->queryAll();
		

		$news_count = Yii::app()->db->createCommand()
								->select('count(id) as count')
								->from('news n')
								
								->where('id != :id',array(':id'=>$id))	
								
								->queryAll();
								
		
		$data['list'] 	= $news;
		$data['total'] 	= $news_count[0]['count'];
		$data['total_page'] = ceil($news_count[0]['count']/16);
		return $data;
		
		
	}
	
	function fetch_brand_details($id)
	{
		$product_brand = Yii::app()->db->createCommand()
								->select('*')
								->from('product_brand pb')
								->where('id = :id',array(':id'=>$id))	
								->queryAll();
		
		return $product_brand;
	}
	
	function fetch_brand($limit,$start,$id=0)
	{
		$product_brand = Yii::app()->db->createCommand()
								->select('*')
								->from('product_brand pb')
								
								->where('id != :id',array(':id'=>$id))	
								
								
								->order('id desc')
								->limit($limit,$start)
								->queryAll();
		

		$product_brand_count = Yii::app()->db->createCommand()
								->select('count(id) as count')
								->from('product_brand pb')
								
								->where('id != :id',array(':id'=>$id))	
								
								->queryAll();
								
		
								
		
		$data['list'] 	= $product_brand;
		$data['total'] 	= $product_brand_count[0]['count'];
		$data['total_page'] = ceil($product_brand_count[0]['count']/16);
		return $data;
		
		
	}
	
	
	function fetch_brand_by_category($limit,$start,$id=0,$master_category_name,$master_brand_name)
	{
		$product_brand = Yii::app()->db->createCommand()
								->select('*')
								->from('product_brand pb')
								
								->where('id != :id and master_category_name = :master_category_name and master_brand_name= :master_brand_name',
								array(':id'=>$id,':master_category_name'=>$master_category_name,':master_brand_name'=>$master_brand_name))	
								
								->order('id desc')
								->limit($limit,$start)
								->queryAll();
		

		$product_brand_count = Yii::app()->db->createCommand()
								->select('count(id) as count')
								->from('product_brand pb')
								
								->where('id != :id and master_category_name = :master_category_name and master_brand_name= :master_brand_name',
								array(':id'=>$id,':master_category_name'=>$master_category_name,':master_brand_name'=>$master_brand_name))	
								
								
								->queryAll();
								
		
								
		
		$data['list'] 	= $product_brand;
		$data['total'] 	= $product_brand_count[0]['count'];
		$data['total_page'] = ceil($product_brand_count[0]['count']/16);
		return $data;
		
		
	}
	
	function brand_count_by_category($master_category_name,$master_brand_name)
	{
			
			
			
		$product_brand_count = Yii::app()->db->createCommand()
								->select('count(id) as count')
								->from('product_brand pb')
								
								->where('master_category_name = :master_category_name and master_brand_name= :master_brand_name',
								array(':master_category_name'=>$master_category_name,':master_brand_name'=>$master_brand_name))	
								
								->queryAll();
								
		
		return $product_brand_count[0]['count'];			
			
	}
	
	
	function fetch_brand_specification($id)
	{
	
			
		$product_brand_specification_main_category = Yii::app()->db->createCommand()
								->select('distinct(main_title)')
								->from('brand_product_specification pbs')
								
								->where('brand_product_id = :brand_product_id',
								array(':brand_product_id'=>$id))	
								->order('id asc')
								->queryAll();
								
		
		return $product_brand_specification_main_category;
		
	}


function fetch_brand_specification_detail($id,$main_title)
	{
	
			
		$product_brand_specification = Yii::app()->db->createCommand()
								->select('*')
								->from('brand_product_specification pbs')
								
								->where('brand_product_id = :brand_product_id and main_title= :main_title',
								array(':brand_product_id'=>$id,':main_title'=>$main_title))	
								->order('id asc')
								->queryAll();
								
		
		return $product_brand_specification;
		
	}	
	
}
