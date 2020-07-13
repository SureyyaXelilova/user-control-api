1)Eger composer install olmayibsa komputerinizde ilk once composer install edirsiz :
https://getcomposer.org/download/.
2) Daha sonra proyekti clone edirsiz :
 git clone https://github.com/SureyyaXelilova/user-control-api.git
3) Proyekti clone etdikden sonra bu commandi commond lineye yazirsiz :
composer install 
4) Fayillarin icinde user_control.sql fayli var onu phpmyadmin import edib, bazanin username ile passwordunu hemin qovluqda olan .env faylinda bu sekilde yerine yazirsiz :
DB_USERNAME= username
DB_PASSWORD='password'

5) Daha sonra command lineye bu commandi yazirsiz :
php artisan serve 

6)http://127.0.0.1:8000/api/users den istifadecilerin siyahisina baxa bilersiz

Api nin kodlarina baxmaq istesez qovlugun icinde app\Http\Controller\UsersControlle.php  faylinda baxa bilersiz.

Postman da test etmek ucun 
1) get etmek ucun (postmanda get methodu secirsiz) http://127.0.0.1:8000/api/users
1) details a baxma1 ucun (postmanda details methodu secirsiz) http://127.0.0.1:8000/api/users/1
2) post etmek ucun (postmanda post methodu secirsiz)  http://127.0.0.1:8000/api/users 
{
'first_name' : 'Sureyya',
'last_name' : "Xelilova",
 'gender' => 'male',
'dob' => '1995-03-27',
'email' => 'sureyya.xelil@gmail.com',
'phone' => 514318438,
'address'=>'Baku, Azerbaijan',
'status'=>'active'
}
3) update etmek ucun (postmanda put methodu secirsiz) http://127.0.0.1:8000/api/users/1
{
'first_name' : 'Sureyya Updated',
'last_name' : "Xelilova",
 'gender' => 'male',
'dob' => '1995-03-27',
'email' => 'sureyya.xelil@gmail.com',
'phone' => 514318438,
'address'=>'Baku, Azerbaijan',
'status'=>'active'
}
4) delete etmek ucun (postmanda delete methodu secirsiz) http://127.0.0.1:8000/api/users/1





