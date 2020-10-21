<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
	public function getStatistical(){
		//tiep nhan
		$transactionDefault = Transaction::where('tr_status',0)->select('id')->count();
		//hoan tat
		$transactionSuccess = Transaction::where('tr_status',2)->select('id')->count();
		//van chuyen
		$transactionProcess = Transaction::where('tr_status',1)->select('id')->count();
		//Huy bo
		$transactionCancel = Transaction::where('tr_status',-1)->select('id')->count();
		//Da thanh toan
		$transactionPay = Transaction::where('tr_status',4)->select('id')->count();
		$statusTransaction = [	
			['Hoàn tất' , $transactionSuccess, false],
			['Tiếp nhận' , $transactionDefault, false],
			['Hủy bỏ' , $transactionCancel, false],
			['Vận chuyển' , $transactionProcess, false],
			['Đã thanh toán' , $transactionPay, false]
		];

		$listDay = Date::getListDateinMonth();

		$dataTransaction = Transaction::where('tr_status',2)->orwhere('tr_status',4)
		->whereMonth('created_at',date('m'))
		->select(DB::raw('sum(tr_total) as totalMoney'),DB::raw('DATE(created_at) day'))
		->groupBy('day')
		->get()->toArray();

		$dataTransactionDefault = Transaction::where('tr_status',0)
		->whereMonth('created_at',date('m'))
		->select(DB::raw('sum(tr_total) as totalMoney'),DB::raw('DATE(created_at) day'))
		->groupBy('day')
		->get()->toArray();

		$arrData = [];
		$arrDataDefault = [];
		foreach ($listDay as $day ) {
			$total = 0;
			foreach ($dataTransaction as $key => $revenue) {
				if($revenue['day'] == $day){
					$total = $revenue['totalMoney'];
					break;
				}
			}
			$arrData[] = (int)$total;

			$total = 0;
			foreach ($dataTransactionDefault as $key => $revenue) {
				if($revenue['day'] == $day){
					$total = $revenue['totalMoney'];
					break;
				}
			}
			$arrDataDefault[] = (int)$total;
		}
		$customers = Customers::all();
		$data = [
			'statusTransaction' =>json_encode($statusTransaction),
			'listDay' => json_encode($listDay),
			'arrData'=>json_encode($arrData),
			'arrDataDefault'=>json_encode($arrDataDefault),
			'customers' => $customers
		];
		return view('backend.statistics-by-month',$data);
	}
}

