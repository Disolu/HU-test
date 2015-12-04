<?php
namespace app\Http\Helpers;

class DateHelper
{

	public static function translateDate($fecha)
	{

		switch ($fecha) {
			case '01':
				$mes = "Ene";
				break;

			case '02':
				$mes = "Feb";
				break;

			case '03':
				$mes = "Mar";
				break;

			case '04':
				$mes = "Abr";
				break;

			case '05':
				$mes = "May";
				break;

			case '06':
				$mes = "Jun";
				break;

			case '07':
				$mes = "Jul";
				break;

			case '08':
				$mes = "Ago";
				break;

			case '09':
				$mes = "Sep";
				break;

			case '10':
				$mes = "Oct";
				break;

			case '11':
				$mes = "Nov";
				break;

			case '12':
				$mes = "Dic";
				break;

			default:
				$mes = "";
				break;
		}
		return "Pensión: ".$fecha;
	}
}