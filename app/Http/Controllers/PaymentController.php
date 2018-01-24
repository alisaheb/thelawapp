<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use App\AdminToLawyer;
use App\Bid;
use App\Carddetail;
use App\Classes\CreditCard;
use App\Http\Requests;
use App\PaymentToLawapp;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class PaymentController extends Controller
{
    public function payment()
    {
        $userid = Auth::user()->id;
        if (Auth::user()->type == 'lawyer') {
            $usercount = Account::where('user_id', $userid)->count();
            $user = Account::where('user_id', $userid)->first();

            return view('userpanel.payment-add-account', ['user' => $user]);
        } else {
            $userid = Auth::user()->id;
            $cardnumber = '';
            $cardtype = '';
            $expiremonth = '';
            $expireyear = '';
            $fcardnumber='';
            $carddetails = Carddetail::where('user_id', $userid)->first();
            $cardcount = Carddetail::where('user_id', $userid)->count();
            if ($cardcount > 0) {
                $cardnumber = substr($carddetails->cardnumber, -4);
                $fcardnumber = $carddetails->cardnumber;
                $cardtype = ucfirst($carddetails->cardtype);
                $expiremonth = $carddetails->expiremonth;
                $expireyear = $carddetails->expireyear;
            }
            return view('front.payment-add-card', ['cardnumber' => $cardnumber, 'cardtype' => $cardtype, 'expiremonth' => $expiremonth, 'expireyear' => $expireyear, 'fcard' => $fcardnumber]);
        }
    }

    public function cardverification(Request $request)
    {
        $nameoncard = $request->nameoncard;
        $cnum = $request->cnum;
        $cvc = $request->cvc;
        $expmonth = $request->expmonth;
        $expiryyear = $request->expiryyear;
        $cardtype = '';
        $flag = true;
        $userid = Auth::user()->id;

        $card = CreditCard::validCreditCard($cnum);
        $response['message'] = 'ok';
        if ($card['valid'] == 1) {
            $cardtype = $card['type'];
        } else {
            $flag = false;
            $response['message'] = 'Not a Valid Card';
        }

        $validCvc = CreditCard::validCvc($cvc, $cardtype);

        if (!$validCvc) {
            $flag = false;
            $response['message'] = 'Not a Valid CVC';
        }

        $validDate = CreditCard::validDate($expiryyear, $expmonth); // past date
        if (!$validDate) {
            $flag = false;
            $response['message'] = 'Not a Valid Date';
        }

        echo json_encode($response);

        if ($flag == true) {

            $cardcount = Carddetail::where('user_id', $userid)->count();
            if ($cardcount > 0) {
                $carddetail = Carddetail::where('user_id', $userid)->update(['nameoncard' => $nameoncard, 'cardnumber' => $cnum, 'cardtype' => $cardtype, 'expiremonth' => $expmonth, 'expireyear' => $expiryyear, 'user_id' => $userid]);
            } else {
                $carddetail = new Carddetail;
                $carddetail->nameoncard = $nameoncard;
                $carddetail->cardnumber = $cnum;
                $carddetail->cardtype = $cardtype;
                $carddetail->expiremonth = $expmonth;
                $carddetail->expireyear = $expiryyear;
                $carddetail->user_id = $userid;
                $carddetail->save();

                $profile_completion = User::find($userid)->profile_completion;
                $profile_completion = $profile_completion + 30;
                User::where('id', $userid)->update(['profile_completion' => $profile_completion]);
            }
        }

    }

    public function cardveri(Request $request)
    {
        $userid = Auth::user()->id;
        $cardnumber = '';
        $cardtype = '';
        $expiremonth = '';
        $expireyear = '';
        $carddetails = Carddetail::where('user_id', $userid)->first();
        $cardcount = Carddetail::where('user_id', $userid)->count();
        if ($cardcount > 0) {
            $cardnumber = substr($carddetails->cardnumber, -4);
            $fcardnumber = $carddetails->cardnumber;
            $cardtype = ucfirst($carddetails->cardtype);
            $expiremonth = $carddetails->expiremonth;
            $expireyear = $carddetails->expireyear;
        }
        return view('userpanel.creditcard_verification', ['cardnumber' => $cardnumber, 'cardtype' => $cardtype, 'expiremonth' => $expiremonth, 'expireyear' => $expireyear, 'fcard' => $fcardnumber]);
    }


    public function checkcard(Request $req)
    {
        $userid = $req->userid;
        $carddetails = Carddetail::where('user_id', $userid)->first();
        $cardcount = Carddetail::where('user_id', $userid)->count();
        if ($cardcount > 0) {
            $cardnumber = substr($carddetails->cardnumber, -4);
            $fcardnumber = $carddetails->cardnumber;
            $cardtype = ucfirst($carddetails->cardtype);
            $expiremonth = $carddetails->expiremonth;
            $expireyear = $carddetails->expireyear;

            $response['fcardnumber'] = $fcardnumber;
            $response['cardnumber'] = $cardnumber;
            $response['cardtype'] = $cardtype;
            $response['expiremonth'] = $expiremonth;
            $response['expireyear'] = $expireyear;
            $response['ok'] = '1';
        } else {
            $response['ok'] = '0';
        }
        echo json_encode($response);
    }

    public function paytoadmin(Request $req)
    {

        $paymentby = Auth::user()->id;
        $taskid = $req->taskid;
        $paidto = $req->paidto;
        $price = $req->price;
        $cardno = $req->cardno;
        $carddetails = Carddetail::where('user_id', $paymentby)->first();


        /*********************************************/
        /*$carddetails->cardnumber
        $carddetails->expiremonth
        $carddetails->expireyear*/

        define("AUTHORIZENET_LOG_FILE", "phplog");

        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName("3QGUd6twJ6d");
        $merchantAuthentication->setTransactionKey("5ee9M753p8ZkH5cC");

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardno);
        $creditCard->setExpirationDate("2038-12");
        //$creditCard->setCardCode("123");
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a transaction
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($price);
        $transactionRequestType->setPayment($paymentOne);

        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null) {
            $tresponse = $response->getTransactionResponse();

            if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
                //echo json_encode("Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode());
                //echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
                $trans_id = $tresponse->getTransId();
                $pay = new PaymentToLawapp;

                $pay->payment_by = $paymentby;
                $pay->task_id = $taskid;
                $pay->payment_gross = $price;
                $pay->payment_to = $paidto;
                $pay->status = 'Approved';
                $pay->txn_id = $trans_id;

                $pay->save();


                $paytoclient = new AdminToLawyer;

                $paytoclient->payment_by = $paymentby;
                $paytoclient->task_id = $taskid;
                $paytoclient->payment_gros = $price;
                $paytoclient->payment_to = $paidto;
                $paytoclient->status = 'pending';
                //$paytoclient->txn_id        = $trans_id;

                $paytoclient->save();

                $msg = json_encode($trans_id);
            } else {
                $msg = json_encode("Charge Credit Card ERROR :  Invalid response");
            }
        } else {
            $msg = json_encode("Charge Credit card Null response returned");
        }


        /********************************************/
        // $paytoclient = new AdminToLawyer;

        //$pay->save();
        $task = Task::where('id', $taskid)->update(['assigned_to' => $paidto, 'status' => 'accept']);

        /* if( $task ){

             $client  = Task::find($request->taskid);

             $notification                       = new Notification;
             $notification->sender_id            = $userid;
             $notification->type_of_notification = 'bid';
             $notification->title                = 'make an offer.';
             $notification->href                 = $bid->id;
             $notification->description          = 'this is new bid';
             //$notification->is_read              = '1';
             $notification->recipient_id  = $client['user_id'];

             $notification->save();

         }*/

        $update = Bid::where(['user_id' => $paidto, 'task_id' => $taskid])->update(['status' => '1']);
        //echo json_encode('ok');

        echo 'ok';


    }


    public function pay_to_lawyer(Request $req)
    {/*
        $paymentby = Auth::user()->id;
        $taskid=$req->taskid;
        $paidto = $req->userid;
        $price = $req->price;
        
        $pay=new PaymentToLawapp;
        $pay->payment_by=$paymentby
        $pay->task_id=$taskid;
        $pay->payment_gross=$price;
        $pay->payment_to=$paidto;
      */
    }

    // admin section

    public function pay_to_admin_list()
    {
        $payment = PaymentToLawapp::all();
        //echo "<pre>"; var_dump($payment); die();
        return view('admin.payment_to_admin', ['payment' => $payment]);
    }

    public function pay_to_lawyer_list()
    {
        $payment = AdminToLawyer::all();
        //echo "<pre>"; var_dump($payment); die();
        return view('admin.payment_to_lawyer', ['payment' => $payment]);
    }

    public function payment_history(Request $req)
    {
        $userid = Auth::user()->id;
        $usertype = Auth::user()->type;

        if ($usertype == 'lawyer') {
            $payments = AdminToLawyer::where('payment_to', $userid)->get();
            return view('userpanel.payment_history_to_lawyer', ['payments' => $payments]);
        } else {
            $payments = PaymentToLawapp::where('payment_by', $userid)->get();
            return view('front.payment_history_to_admin', ['payments' => $payments]);
        }
    }

}
