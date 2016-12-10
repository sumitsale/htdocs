	
	<div id="rate_and_fair_month">
									<?php 
									
									// echo "<pre>";
									// print_r($result);
									
									?>
									<div class="package_custom">
										<label>Month & Date </label>
										
										<?php $current_month = date("m");
	
												$month_name = date('F Y');
												
												$default_month =$month;
										  
												?>
										<select id="select_month">
										  <option value="">Select Month</option>
										 
										 <?php for($m=$current_month;$m<=(12+$current_month);$m++) {  ?>
										 
											<option  package_id="<?php echo $result['rate_and_fair_data'][0]['package_id'] ?>"  <?php if($month_name ==  $default_month) { echo "selected=selected"; }?> value="<?php echo $month_name; ?>"><?php echo $month_name; ?></option>
										 
										 <?php 
										 
										 $month_name = date("F Y", strtotime("+1 month", strtotime($month_name)));} ?>
										 
										</select> 
									</div>
									<div class="schedule text-overflow">
										
										  <table class="week">
											<thead>
											  <tr class="a">
												<td>Monday</td>
												<td>Tuesday</td>
												<td>Wednesday</td>
												<td>Thursday</td>
												<td>Friday</td>
												<td>Saturday</td>
												<td>Sunday</td>
											  </tr>
											</thead>
										  <tbody>
										  <?php 
										  
										  $available_month = json_decode($result['rate_and_fair_data'][0]['available_date']);
										  
										  // echo "<pre>";
										  // print_r($available_month);exit;
										  
										  
										  $first_day_of_month = date("Y-m-d", mktime(0,0,0,date('m',strtotime($default_month)),1,date('Y',strtotime($default_month))));
										 
										  $last_day_of_month  = date('Y-m-d', mktime(0,0,0,date('m',strtotime($default_month))+1,0,date('Y',strtotime($default_month))));
										 
										  $start_week_no = date('W',strtotime($first_day_of_month));
										  
										  $end_week_no   = date('W',strtotime($last_day_of_month));
										  
										  // echo $start_week_no."<br>";
										  // echo $end_week_no."<br>";exit;
										  
										  if($start_week_no>$end_week_no)
										  {
											$end_week_no  = $start_week_no+4;
										  }
										  
										  for($weekno=$start_week_no;$weekno<=$end_week_no;$weekno++) { 
										  
										    if($weekno > 01 && $weekno<10) 
										  {
											if(strpos($weekno, '0') === false)
											  {
												$weekno= "0".$weekno;
											  }
										  }
										  ?>
										  
											<tr>
											<?php for($day=1;$day<=7;$day++) { ?>
											
											  <td <?php if(isset($available_month->$default_month)) 
															{ 
																if( in_array(date('d F Y', strtotime(date("Y",strtotime($default_month))."W".$weekno.$day)),$available_month->$default_month)) { echo "class='book'";  } } ?>><?php if($default_month == date('F Y', strtotime(date("Y",strtotime($default_month))."W".$weekno.$day))) echo date('d', strtotime(date("Y",strtotime($default_month))."W".$weekno.$day)); ?></td>
											  
											<?php } ?>
											</tr>
											
											<?php } ?>
											<!--<tr>
											  <td class="book">7</td>
											  <td>8</td>
											  <td class="book">9</td>
											  <td class="book">10</td>
											  <td>11</td>
											  <td>12</td>
											  <td>13</td>
											</tr>
											
											<tr>
											  <td >14</td>
											  <td>15</td>
											  <td>16</td>
											  <td>17</td>
											  <td>18</td>
											  <td>19</td>
											  <td>20</td>
											</tr>
											<tr>
											  <td>21</td>
											  <td>22</td>
											  <td>23</td>
											  <td>24</td>
											  <td>25</td>
											  <td>26</td>
											  <td>27</td>
											</tr>
											<tr>
											  <td>28</td>
											  <td>29</td>
											  <td>30</td>
											  <td>31</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											</tr>-->
											</tbody>
										  </table>
										 
										  
									</div>
									<div class="package_custom">
										<label>Available Dates </label>
										<span class="avilable"></span>
									</div>
									
									</div>