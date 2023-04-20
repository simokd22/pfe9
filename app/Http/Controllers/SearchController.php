<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function results(Request $request)
    {
        $data = $request->session()->get('data');
        //redirect('test/results');
        return view('user.results',['data'=>$data,'activeTab'=>0]);

    }
    public function search(Request $request)
    {
      //dd($request->all());
        $key_word = $request->input('keyword');
        $date_start = $request->input('start_date');
        $date_end = $request->input('end_date');
        $Category = $request->input('Category'); 
        $sites=$request->input('sites'); 
        
        $data=ScrapController::handle($key_word);//,$date_start,$date_end,$Category);
         /* $data=[
            "goud" =>[
                "PagesNumber" => 10,
                0 =>[
                  "category" => "آش واقع",
                  "title" => "علاش هاد السكوت ديال الحكومة على غلا اللحم والخضرا فضيحة. نهار سيدنا عيط لمسؤول على فايك كيروج وقال ليه خرجو شرحو للمغاربة وتواصلو معاهم",
                  "text" => "
                    كود هناء ابو علي  
                    مرة مسؤول اتصل بيه الملك محمد السادس فالليل باش يسولو على فايك كيروج. عارف باللي هادي اشاعة. الاتصال باش يآمرو يتواصل مع لمغاربة. يهدر معاهم ما يبقاش ساكت. 
                    هاد الشي اللي واقع فثمن اللحم وماطيشة وغيرها من الخضر راه موضوع كان اخطر بكثير بداك اللي سيدنا جبد ودنين داك المسؤول وخلاه فالغد يتواصل مع لمغاربة ويزول ديك الا 
                    دابا دايرا تسجيلات فيها حتى اللي كيحرض لمغاربة على شراء الخوضرا بزاف لانو غادي يكون اضراب وشي تخربيق اخر. يعني الوضعية الحالية كتدفع الحكومة باش تخرج دابا قبل غ 
                    الناطق الرسمي باسم الحكومة مصطفى بايتاس ضعيف ووزير الفلاحة ضارب الطم ووزير الداخلية ما كيحلش فمو گاع. هادو خاصهم يخرجو. خاصهم يتواصلو مع المغاربة. 
                    من الاحسن يخرجو اليوم قبل الغد. يمكن يندمو وتجبد ليهم لودينات 
                    ",
                  "image" => "https://www.goud.ma/wp-content/cache/thumbnails/2018/08/A268D53B-EF87-44E1-89B2-B8AFE76DC3D3-600x300-c.jpeg",
                  "date" => "09/02/2023 08:00",
                ],
            1 =>[
                  "category" => "آش واقع",
                  "title" => "سيدنا ما غاديش يتلاقى بسانشيث. هدر معاه غير فالتلفون",
                  "text" => "
                    كود الرباط /// 
                    الحكومة الإسبانية كانت كتسنى استقبال ملكي لرئيس الوزراء بيدرو سانشيث. ما غاديش يوقع هاد الشي 
                    بيان للديوان الملكي قال باللي الملك محمد السادس، يجري، اليوم، اتصالا هاتفيا ببيدرو سانشيز رئيس الحكومة الإسبانية”. 
                    سانشيث غادي يوصل بعد قليل للرباط باش يشارك فاللجنة العليا لتتبع العلاقات بين البلدين. 
                    والأنظار تتجه اليوم للقمة الثنائية بين المغرب واسبانيا، وللي غادي تعرف توقيع عدد من الاتفاقيات فعدة مجالات حيوية خصوصا الجانب الاقتصادي والمالي. 
                    ",
                  "image" => "https://www.goud.ma/wp-content/cache/thumbnails/2023/01/المغرب-إسبانيا-قمة-600x300-c.jpg",
                  "date" => "01/02/2023 15:22",
                ]
            ],
            "almassaa" =>[
                "PagesNumber" => 2,
                0 =>[
                  "category" => "اقتصاد",
                  "title" => "بعد “لهيب” الأسعار.. الحكومة تُقلص صادرات الطماطم والبطاطس والبصل لضمان التموين العادي",
                  "text" => "
                    المساء اليوم: 
                    علّق الناطق الرسمي باسم الحكومة مصطفى بايتاس، على صدور بلاغ من جمعية المصدرين المغاربة عن وقف صادرات الطماطم والبطاطس والبصل إلى الأسواق الإفريقية بالقول إن الح 
                    وتعرف أسعار الطماطم منذ فترة ارتفاعات قياسية، فبعدما كان ثمن الكيلوغرام الواحد لا يتجاوز 5 دراهم قبل أسابيع، قفز ثمنه إلى 9 دراهم وأكثر،  الشيء الذي أثار استياء 
                    وفي هذا الصدد أوضح بايتاس، خلال ندوة صحافية اليوم الخميس، عقب انعقاد المجلس الحكومي، أن كمية الطماطم المزروعة هذا العام أفضل بالمقارنة مع السنة الماضية، مشيراَ  
                    كما أكد أن المهنيين استحسنوا هاذين الاجرائين، مشيراً إلى أن تأثير هاته الإجراءات سيظهر في القريب العاجل، وبشأن الحليب، قال بايتاس إن الحكومة اتخذت مجموعة من الإ 
                    ",
                  "image" => "https://almassaa.com/wp-content/uploads/2023/02/dXxhwmDSgeXeFxmQPCAuUIuR8w3ZaFPCnPbxOoU1.jpeg",
                  "date" => "9 فبراير، 2023",
                ],
                1 =>[
                  "category" => "اقتصاد",
                  "title" => "المغرب يستورد 30 ألف رأس من الأبقار والعجول من أميركا الجنوبية",
                  "text" => "
                    المساء اليوم: 
                    أكدت الحكومة أن أسعار اللحوم الحمراء ستسجل تراجعا بفضل الإجراءات التي تم اتخاذها، وأشار  رئيس الحكومة عزيز أخنوش إلى أن ذلك سيمكن المهنيين من استيراد حوالي 30 أ 
                    وينتظر أن تخفف هذه الخطوة الضغط على القطيع الوطني، إلى جانب تخفيض أسعار بيع اللحوم بالتقسيط، بعد إلغاء الضريبة على القيمة المضافة، ووقف استيفاء الرسوم الجمركية  
                    وعزت وزيرة الاقتصاد والمالية نادية فتاح، سابقاً ارتفاع أسعار اللحوم الحمراء بالسوق الوطنية، إلى تداعيات الجفاف، التي أدت إلى نقص الأبقار الأليفة وارتفاع الأعلاف 
                    الجدير بالذكر أن الحكومة علقت الأسبوع الماضي، الضريبة على القيمة المضافة إلى جانب اعتماد المرسوم المتعلق بوقف استيفاء رسم الاستيراد المفروض على الأبقار الأليفة، 
                    ",
                  "image" => "https://almassaa.com/wp-content/uploads/2023/02/الابقار-الحلوب--780x470.webp",
                  "date" => "9 فبراير، 2023",
                ]
            ]
        ];  */
        
        $request->session()->put('data', $data);
        return redirect()->route('user.SearchResults');

        //$site = $request->input('site');
        //return self::results($data,$key_word);
        //return self::article($data,0);
        

    }
    public function show(Request $request,$news,$id)
    {
        $data = $request->session()->get('data');
        //$article=Controller::getArticle($data[$id]);
        return view('user.article',['data'=>$data,'news'=>$news,'id'=>$id]);
    }
}

