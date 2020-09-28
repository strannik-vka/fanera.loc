@extends('layouts.app')

@section('head')
<title>Деревянные коробки оптом от Производителя! Купить коробки из фанеры и древа.</title>
<meta name="description" content="Деревянная коробка из дерева или фанеры. Подарочная упаковка из дерева оптом. Деревянные коробки от производителя.">
<meta name="keywords" content="упаковка из фанеры, коробка из дерева, коробка из дерева купить, подарочные коробки из дерева, подарочные коробки из фанеры, упаковка из фанеры, подарочная упаковка из фанеры, деревянный упаковка, коробка фанера купить, коробка фанера, ящик деревянный подарочный, фанерный ящик, подарочный упаковка, коробка из фанеры, коробок из фанеры, коробка из фанеры купить, деревянная коробка, деревянный коробок, шкатулка дерево, шкатулка деревянный, деревянная шкатулка,
деревянный упаковка, деревянная коробка купить, коробка фанера,
коробка из фанеры, коробка из дерева, деревянный дом коробка, купить деревянную шкатулку, фанерный ящик, деревянные коробки цена, деревянные коробки для подарков,
деревянная подарочная коробка, упаковка из фанеры, ящик деревянный подарочный, подарочные коробки из дерева, коробка фанера купить, коробка из дерева купить, коробка из фанеры купить,
подарочные коробки из фанеры, подарочная упаковка из фанеры, деревянные шкатулки оптом,
деревянные шкатулки купить оптом">
@endsection

@section('content')
<main class="main" id="home">
  <section class="section section--main">
    <div class="section__inner container">
      <img src="/img/first-section.png" alt="Создаем упаковку и коробки из фанеры">
      <h1 class="site-title">Создаем упаковку и коробки из фанеры</h1>
      <p class="">Коробки и упаковка из <br>фанеры от 20р./шт. Под ключ.</p>
      <div class="form__wrapper">
        <form class="form">
          <input type="hidden" name="message" value="Заказ прайс листа">
          <p class="form-title">Запросить ОПТ <br>прайс-лист:</p>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="ФИО" name="name" id="name2">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Телефон" name="phone" id="phone2">
          </div>
          <div class="form-group">
            <button class="btn btn--primary" type="submit" id="submit2" onclick="yaCounter67210411.reachGoal('price-button'); return true;">Запросить прайс-лист
            </button>
          </div>
          <div class="messages"></div>
        </form>
      </div>
    </div>

    <div class="container">
      <div class="features">
        <div class="row">
          <div class="features__item col-12 col-md-6 col-lg-3">
            <p class="features__value text-primary text-bold">
              <span class="number">2</span><br>
              Дня
            </p>
            <p class="features__desc">Среднее время выполнения </p>
          </div>
          <div class="features__item col-12 col-md-6 col-lg-3">
            <p class="features__value text-primary text-bold">
              <span class="number">>20</span><br>
              Рублей
            </p>
            <p class="features__desc">Стоимость готового изделия</p>
          </div>
          <div class="features__item col-12 col-md-6 col-lg-3">
            <p class="features__value text-primary text-bold">
              <span class="number">182</span><br>
              Проектов
            </p>
            <p class="features__desc">Реализовано <br>нами</p>
          </div>
          <div class="features__item col-12 col-md-6 col-lg-3">
            <p class="features__value text-primary text-bold">
              <span class="number">14</span><br>
              Тысяч
            </p>
            <p class="features__desc">Готовых изделий произведено</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if(count($categories))
  <section class="section">
    <div class="container">
      <h2 class="section__title">Деревянная коробка</h2>
      <p class="section__subtitle">Лучшие цены на упаковку из дерева и фанеры. <br>
        Запросите расчет вашей коробки и убедитесь сами!</p>
      <div class="row">
        @foreach($categories as $category)
          <div class="catalog__item card col-12 col-sm-6 col-lg-3">
            <div class="card__inner">
              <div class="card__image">
                <img src="{{ $category->image_url(0, 250) }}" alt="{{ $category->name }}">
              </div>
              <div class="card__body">
                <p class="card__title">{{ $category->title }}</p>
                <a href="{{ Route('category.show', $category) }}" class="btn btn--light">Посмотреть</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <section class="section" id="how_order">
    <div class="container">
      <h2 class="section__title">Как сделать заказ?</h2>
      <div class="row">
        <div class="card card--hr col-12">
          <div class="card__inner">
            <div class="card__image">
              <svg width="89" height="89" viewBox="0 0 89 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path d="M88.123 0.228463C87.5809 -0.0809512 86.9141 -0.0757364 86.3769 0.242021L54.5222 19.0787C53.6959 19.5674 53.4221 20.6333 53.9107 21.4597C54.3992 22.2859 55.4651 22.5596 56.2916 22.0712L79.1469 8.55622L36.5753 52.7282L15.4017 46.2503L43.0343 29.9105C43.8607 29.4217 44.1344 28.3558 43.6458 27.5294C43.1573 26.7032 42.0913 26.4291 41.2649 26.9179L10.2402 45.2635C9.64746 45.6141 9.31736 46.2814 9.39889 46.9655C9.48041 47.6495 9.95792 48.2207 10.6164 48.4221L35.903 56.1582L47.0588 76.4636C47.0704 76.4846 47.0824 76.5023 47.0947 76.5182C47.2809 76.8286 47.5599 77.0822 47.9079 77.2286C48.1257 77.3202 48.3546 77.3649 48.582 77.3649C49.0275 77.3649 49.4661 77.1935 49.7972 76.8696L62.6247 64.3332L86.7531 71.7149C86.92 71.7659 87.0912 71.7911 87.2615 71.7911C87.6294 71.7911 87.9927 71.6743 88.2955 71.4502C88.7386 71.1224 89 70.6038 89 70.0528V1.73833C89 1.11412 88.6652 0.537703 88.123 0.228463ZM47.1535 57.2295C46.9522 57.5203 46.8442 57.8655 46.8442 58.2193V68.8525L39.2266 54.9871L72.9355 20.0111L47.1535 57.2295ZM50.3208 71.4971V60.5691L58.8367 63.1744L50.3208 71.4971ZM85.5234 67.7032L51.3664 57.2533L85.5234 7.94469V67.7032Z" fill="#977A4F" />
                  <path d="M28.5813 60.4188C27.9024 59.74 26.802 59.74 26.1229 60.4188L9.89569 76.646C9.21689 77.3248 9.21689 78.4255 9.89569 79.1044C10.2353 79.4437 10.6802 79.6134 11.125 79.6134C11.5698 79.6134 12.0147 79.4437 12.3541 79.1043L28.5813 62.877C29.2601 62.1984 29.2601 61.0977 28.5813 60.4188Z" fill="#977A4F" />
                  <path d="M6.96549 82.0342C6.28651 81.3558 5.18618 81.3558 4.50721 82.0344L0.509164 86.0324C-0.169635 86.7112 -0.169635 87.8119 0.509164 88.4909C0.84865 88.8302 1.29348 88.9998 1.7383 88.9998C2.18313 88.9998 2.62795 88.83 2.96744 88.4907L6.96549 84.4927C7.64429 83.8139 7.64429 82.7132 6.96549 82.0342Z" fill="#977A4F" />
                  <path d="M24.7964 85.9302C24.4733 85.6069 24.0248 85.4209 23.5676 85.4209C23.1085 85.4209 22.662 85.6069 22.3387 85.9302C22.0153 86.2535 21.8293 86.7003 21.8293 87.1592C21.8293 87.6163 22.0152 88.0648 22.3387 88.3881C22.662 88.7115 23.1104 88.8975 23.5676 88.8975C24.0248 88.8975 24.4733 88.7115 24.7964 88.3881C25.1197 88.0648 25.3059 87.6163 25.3059 87.1592C25.3059 86.7003 25.1199 86.2535 24.7964 85.9302Z" fill="#977A4F" />
                  <path d="M37.7296 72.9964C37.0511 72.3176 35.9508 72.3176 35.2713 72.9964L26.6762 81.5913C25.9974 82.2701 25.9974 83.3708 26.6762 84.0496C27.0157 84.3891 27.4605 84.5588 27.9053 84.5588C28.3501 84.5588 28.795 84.3889 29.1345 84.0496L37.7296 75.4547C38.4084 74.7759 38.4084 73.6752 37.7296 72.9964Z" fill="#977A4F" />
                  <path d="M67.3939 72.3366C66.7149 71.658 65.6146 71.658 64.9356 72.3366L56.3172 80.955C55.6384 81.6338 55.6384 82.7345 56.3172 83.4135C56.6567 83.7528 57.1015 83.9226 57.5463 83.9226C57.9912 83.9226 58.436 83.7528 58.7755 83.4135L67.3939 74.7951C68.0727 74.1163 68.0727 73.0156 67.3939 72.3366Z" fill="#977A4F" />
                  <path d="M49.2803 23.6946C48.957 23.3713 48.5085 23.1853 48.0513 23.1853C47.5941 23.1853 47.1457 23.3713 46.8223 23.6946C46.4992 24.0179 46.313 24.4664 46.313 24.9253C46.313 25.3825 46.499 25.8292 46.8223 26.1525C47.1457 26.4776 47.5941 26.6619 48.0513 26.6619C48.5085 26.6619 48.957 26.4776 49.2803 26.1525C49.6034 25.8292 49.7896 25.3825 49.7896 24.9253C49.7896 24.4664 49.6036 24.0179 49.2803 23.6946Z" fill="#977A4F" />
                </g>
              </svg>
            </div>
            <div class="card__body">
              <div class="card__title">отправьте запрос на расчет упаковки</div>
              <div class="card__desc">
                <p>Оставьте заявку любым удобным способом. Позвоните или напишите нам.
                  Мы найдем решение под любое техническое задание.
                  Рассчитаем цену, согласуем сроки.</p>
                @if(isset($setting->contact['phone']))
                <p class="p--bold">Горячая линия: <span class="nowrap">{{ $setting->contact['phone'] }}</span>
                  <span class="nowrap">(звонок бесплатный)</span>
                </p>
                @endif
              </div>
              <a href="#ex1" rel="modal:open" class="btn btn--light">Запрос на расчет</a>
            </div>
          </div>
        </div>
        <div class="card card--hr col-12">
          <div class="card__inner">
            <div class="card__image">
              <svg width="88" height="88" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M84.9454 17.7089H81.7908C81.6222 16.0846 81.2446 14.3845 80.7378 12.3912C79.7782 8.61668 78.7053 5.03961 76.1513 2.75557C73.3269 0.230036 69.2842 -0.252589 63.4289 1.23602C58.2844 2.54382 53.646 4.92875 50.2123 8.00411C49.3295 6.87043 47.9531 6.1391 46.4083 6.1391H41.5919C40.0472 6.1391 38.671 6.87025 37.7883 8.0036C36.498 6.84808 35.0338 5.78297 33.4144 4.83061C32.8006 4.46968 32.0107 4.67438 31.6497 5.28832C31.2888 5.90191 31.4937 6.69202 32.1075 7.05296C33.8925 8.10277 35.464 9.29558 36.7868 10.5981C36.7778 10.7175 36.7718 10.8378 36.7718 10.9595V12.6922C34.6364 11.0824 32.168 9.65635 29.4039 8.44085C28.7525 8.15399 27.9917 8.45047 27.7049 9.10188C27.4184 9.75363 27.7143 10.5143 28.3661 10.8009C31.6513 12.2455 34.4764 13.9958 36.763 16.0033C36.7658 16.0058 36.7689 16.0078 36.7718 16.0104V17.7092H31.6711C31.5544 17.2964 31.3515 16.9074 31.0674 16.5705C30.4858 15.881 29.6347 15.4855 28.7325 15.4855H17.9914C16.7666 15.4855 15.664 16.2132 15.1826 17.3393L15.0245 17.7092H8.80602C8.97239 16.31 9.31081 14.7983 9.7613 13.0266C11.677 5.48975 13.5874 1.10402 23.9358 3.73474C25.0381 4.01507 26.137 4.35521 27.202 4.74639C27.87 4.992 28.611 4.64946 28.8564 3.98069C29.1019 3.31244 28.759 2.57183 28.0907 2.32639C26.943 1.90496 25.7587 1.538 24.5711 1.23619C18.7155 -0.252589 14.6731 0.230036 11.8487 2.75574C9.295 5.03927 8.22198 8.61668 7.26241 12.3912C6.75555 14.3846 6.37794 16.085 6.20933 17.7089H3.05456C1.37019 17.7089 0 19.0792 0 20.7634V28.9717C0 30.5765 1.24455 31.8932 2.81875 32.0144V46.2535L1.46369 49.4227C0.681312 51.2522 1.11358 53.4042 2.53928 54.7777C2.62797 54.8631 2.72198 54.9516 2.81875 55.0417V82.783C2.81875 85.441 4.98111 87.6034 7.63898 87.6034H21.5402C22.2521 87.6034 22.8293 87.0264 22.8293 86.3143C22.8293 85.6022 22.2521 85.0252 21.5402 85.0252H7.63898C6.40269 85.0252 5.39687 84.0193 5.39687 82.783V57.1306C8.39266 59.2574 13.0094 61.6298 19.5002 62.6176C19.7402 62.654 19.9793 62.6717 20.2156 62.6717C22.5153 62.6717 24.5697 60.9952 24.9686 58.6625L29.5243 32.0262H36.3241V85.0251H27.2107C26.4988 85.0251 25.9217 85.6021 25.9217 86.3141C25.9217 87.0262 26.4988 87.6032 27.2107 87.6032H80.361C83.0189 87.6032 85.1813 85.4408 85.1813 82.7828V55.042C85.278 54.9519 85.3722 54.8634 85.4609 54.7778C86.8864 53.4044 87.3187 51.2523 86.5365 49.4229L85.1813 46.2535V32.0145C86.7555 31.8934 88 30.5766 88 28.9718V20.7636C88 19.0792 86.6296 17.7089 84.9454 17.7089ZM2.57812 28.9718V20.7636C2.57812 20.501 2.79194 20.2872 3.05456 20.2872H13.9217L10.0045 29.4484H3.05456C2.79194 29.4483 2.57812 29.2345 2.57812 28.9718ZM8.90209 32.0264L5.39687 40.2241V32.0264H8.90209ZM29.2017 18.62L22.4275 58.2279C22.2227 59.425 21.083 60.2502 19.8882 60.0687C11.4763 58.7887 6.52867 55.0411 4.32816 52.9211C3.66884 52.286 3.47033 51.2874 3.83419 50.4363L17.5527 18.3524C17.6278 18.1767 17.7997 18.0631 17.9908 18.0631H23.3578L21.8819 24.583C21.7247 25.2774 22.1602 25.9678 22.8546 26.1249C22.9505 26.1467 23.046 26.1572 23.1404 26.1572C23.7292 26.1572 24.261 25.7511 24.3965 25.1524L26.0012 18.0633H28.732C28.9247 18.0633 29.0429 18.1693 29.0964 18.2326C29.1497 18.2956 29.2342 18.43 29.2017 18.62ZM33.9625 29.4483H29.9652L31.532 20.287H33.9623V29.4483H33.9625ZM64.064 3.73474C69.0116 2.47713 72.3064 2.77654 74.4325 4.67747C76.445 6.47718 77.3814 9.6536 78.2389 13.0263C78.6335 14.5788 79.0116 16.2003 79.1931 17.7089H72.9759L72.8176 17.3386C72.336 16.2127 71.2336 15.4851 70.009 15.4851H59.2678C58.3657 15.4851 57.5147 15.8806 56.9329 16.5702C56.6488 16.9071 56.4462 17.296 56.3293 17.7089H51.2282V16.0193C51.7024 15.6978 54.0987 14.1476 58.0229 12.8565C58.6993 12.6341 59.0671 11.9055 58.8445 11.2292C58.6221 10.553 57.8939 10.185 57.2172 10.4076C54.542 11.2876 52.5121 12.2852 51.228 13.004V10.9595C51.228 10.8375 51.222 10.7168 51.2129 10.597C54.3869 7.47216 58.9411 5.03721 64.064 3.73474ZM58.0348 29.4483H54.0375V20.287H56.468L58.0348 29.4483ZM39.3496 10.9595C39.3496 9.72321 40.3554 8.71739 41.5917 8.71739H46.4081C47.6444 8.71739 48.6502 9.72321 48.6502 10.9595V17.709H39.3494V10.9595H39.3496ZM49.0978 85.0252H38.9022V32.0264H49.0978V85.0252ZM51.4592 29.4483H36.5406V20.287H51.4592V29.4483ZM83.672 52.9211C81.4712 55.0411 76.5232 58.7887 68.1118 60.0687C66.9149 60.251 65.7771 59.4248 65.5725 58.2279L64.5112 52.023C64.3913 51.3212 63.7245 50.8501 63.0233 50.9698C62.3215 51.0897 61.8501 51.7559 61.97 52.4577L63.0314 58.6625C63.4303 60.9954 65.4847 62.6717 67.7844 62.6717C68.0207 62.6717 68.2596 62.6538 68.4996 62.6176C74.9903 61.6298 79.6072 59.2572 82.6031 57.1304V82.783C82.6031 84.0193 81.5973 85.0252 80.361 85.0252H51.6759V32.0264H58.4757L61.0167 46.8829C61.1366 47.5847 61.8026 48.0555 62.5046 47.9362C63.2063 47.8162 63.6778 47.15 63.5578 46.4482L58.7984 18.6201C58.766 18.4302 58.8507 18.2956 58.9038 18.2324C58.9573 18.1693 59.0753 18.0633 59.268 18.0633H61.6576L62.6438 23.0872C62.7645 23.702 63.3036 24.1282 63.9074 24.1282C63.9898 24.1282 64.0733 24.1203 64.157 24.1038C64.8555 23.9667 65.3108 23.2893 65.1736 22.5906L64.2849 18.0631H70.0092C70.2001 18.0631 70.3722 18.1765 70.4473 18.3522L84.1656 50.4363C84.5297 51.2874 84.3312 52.286 83.672 52.9211ZM79.0979 32.0264H82.6031V40.2238L79.0979 32.0264ZM85.4219 28.9718C85.4219 29.2345 85.2081 29.4483 84.9454 29.4483H77.9957L74.0785 20.287H84.9454C85.2081 20.287 85.4219 20.5008 85.4219 20.7634V28.9718Z" fill="#977A4F" />
              </svg>
            </div>
            <div class="card__body">
              <div class="card__title">БЕСПЛАТНЫЙ МАКЕТ изделия</div>
              <div class="card__desc">
                <p>Наши дизайнеры создадут макет готового изделия и уже на следующий день.
                  Внесем любые поправки и пожелания на стадии создания макета.</p>
                @if(isset($setting->contact['email']))
                <p class="p--bold">Е-mail: <span class="nowrap">{{ $setting->contact['email'] }}</span></p>
                @endif
              </div>
              <a href="#ex1" rel="modal:open" class="btn btn--light">Заказать макет</a>
            </div>
          </div>
        </div>
        <!-- <div class="card card--hr col-12">
          <div class="card__inner">
            <div class="card__image">
              <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path d="M69.6514 9.10852C69.4093 8.37033 68.6145 7.96852 67.8769 8.21039L67.3776 8.37408V7.82789C67.3776 7.05107 66.748 6.42163 65.9713 6.42163C65.1947 6.42163 64.5651 7.05107 64.5651 7.82789V8.37427L64.0658 8.21058C63.3279 7.96926 62.5333 8.37071 62.2912 9.10871C62.0495 9.84671 62.4517 10.6412 63.1896 10.8832L63.7078 11.0533L63.3817 11.5065C62.7096 12.4404 63.3868 13.7345 64.5218 13.7345C65.3413 13.7345 65.6601 13.1554 65.9715 12.7228L66.2788 13.1495C66.7322 13.7795 67.6108 13.9234 68.2418 13.4692C68.872 13.0155 69.0152 12.1369 68.5615 11.5063L68.2352 11.0531L68.7535 10.883C69.4913 10.641 69.8935 9.84653 69.6514 9.10852Z"
                        fill="#977A4F"/>
                  <path d="M83.557 24.2035C83.315 23.4653 82.5202 23.0635 81.7825 23.3054L81.2832 23.4691V22.9229C81.2832 22.146 80.6536 21.5166 79.877 21.5166C79.1003 21.5166 78.4707 22.146 78.4707 22.9229V23.4691L77.9714 23.3054C77.2336 23.0644 76.4391 23.4655 76.1969 24.2035C75.9552 24.9413 76.3574 25.7358 77.0952 25.9778L77.6134 26.1479L77.2872 26.6011C76.8336 27.2314 76.9767 28.1103 77.6071 28.564C78.2382 29.0183 79.1163 28.874 79.57 28.2443L79.8771 27.8176C80.1726 28.228 80.4959 28.8293 81.3269 28.8293C82.4594 28.8293 83.1402 27.5367 82.4671 26.6013L82.1408 26.1481L82.6591 25.978C83.3969 25.7359 83.7991 24.9415 83.557 24.2035Z"
                        fill="#977A4F"/>
                  <path d="M64.7811 22.3594C65.5577 22.3594 66.1873 21.7298 66.1873 20.9531C66.1873 20.1765 65.5577 19.5469 64.7811 19.5469C64.0044 19.5469 63.3748 20.1765 63.3748 20.9531C63.3748 21.7298 64.0044 22.3594 64.7811 22.3594Z"
                        fill="#977A4F"/>
                  <path d="M87.2812 45.1238C88.0579 45.1238 88.6875 44.4942 88.6875 43.7175C88.6875 42.9409 88.0579 42.3113 87.2812 42.3113C86.5045 42.3113 85.8749 42.9409 85.8749 43.7175C85.8749 44.4942 86.5045 45.1238 87.2812 45.1238Z"
                        fill="#977A4F"/>
                  <path d="M72.6561 34.3594C73.4328 34.3594 74.0624 33.7298 74.0624 32.9531C74.0624 32.1765 73.4328 31.5469 72.6561 31.5469C71.8795 31.5469 71.2499 32.1765 71.2499 32.9531C71.2499 33.7298 71.8795 34.3594 72.6561 34.3594Z"
                        fill="#977A4F"/>
                  <path d="M87.8456 15.9844C88.6222 15.9844 89.2518 15.3548 89.2518 14.5781C89.2518 13.8015 88.6222 13.1719 87.8456 13.1719C87.0689 13.1719 86.4393 13.8015 86.4393 14.5781C86.4393 15.3548 87.0689 15.9844 87.8456 15.9844Z"
                        fill="#977A4F"/>
                  <path d="M61.8641 24.2791C61.1319 23.3727 60.0943 23.2817 60.0943 23.2817C59.288 23.1704 58.6065 23.7417 58.5005 24.4724C58.3875 25.2447 58.9239 25.954 59.6893 26.0661L57.1805 28.5111C56.8486 28.8355 56.6968 29.3005 56.7755 29.7561L57.368 33.2101C57.368 33.2101 57.368 33.2101 57.3661 33.2101C53.2346 31.0364 53.9611 31.0507 49.8605 33.208H49.8586C49.8565 33.2101 49.8565 33.2101 49.8547 33.2101L50.4472 29.7561C50.5259 29.3005 50.374 28.8357 50.044 28.5111L47.5336 26.0661L51.0024 25.5619C51.4599 25.4944 51.8555 25.2074 52.0599 24.793L53.6124 21.6505L54.2236 22.8899C54.4618 23.3736 54.9457 23.6753 55.4855 23.6753C56.5265 23.6753 57.2051 22.5803 56.7472 21.6447L56.1343 20.4055C55.1015 18.2905 52.0953 18.3437 51.0886 20.4055L49.8663 22.8842C47.0765 23.2894 46.2042 23.2326 45.3588 24.2791C44.9425 24.7909 44.7213 25.4116 44.7213 26.0734C44.7104 27.532 45.5626 28.0701 47.5507 30.0093L47.0838 32.7355C47.0556 32.893 47.0425 33.0562 47.0425 33.2193C47.0406 33.973 47.3519 34.7043 47.8938 35.2256C48.4381 35.7526 49.1416 36.0262 49.8588 36.0262C50.7367 36.0262 51.0459 35.7629 53.6105 34.4137H53.6124L56.0593 35.6997C57.9198 36.6866 60.1856 35.3171 60.1805 33.2193C60.1805 33.0562 60.1674 32.893 60.1393 32.7355L59.6724 30.0093L61.6522 28.0799C62.7082 27.0601 62.7868 25.4138 61.8641 24.2791Z"
                        fill="#977A4F"/>
                  <path d="M94.5937 49.2656H75.877L76.5441 48.6152C78.4236 46.7835 77.3849 43.5894 74.7887 43.2125L71.1771 42.6875L69.562 39.4149C68.4006 37.0612 65.0423 37.0623 63.8814 39.4149L62.2661 42.6875L58.6547 43.2125C56.0576 43.5896 55.0205 46.784 56.8991 48.6152L57.5664 49.2656H52.535C52.6173 48.4534 52.3488 47.6119 51.728 46.9907L43.7731 39.0358C42.6764 37.9392 40.8923 37.9392 39.7958 39.0358C37.0772 41.7545 36.2743 42.5572 34.9013 43.9305L29.5106 38.5398C28.1927 37.2217 26.331 36.7229 24.5302 37.2052C22.7296 37.6876 21.3667 39.0508 20.8842 40.8511L18.0652 51.372C16.382 52.0868 15.0614 53.4068 14.3465 55.0909L3.82577 57.9098C-0.00806098 58.9367 -1.29469 63.727 1.51426 66.5365L6.90492 71.9272C4.13984 74.6923 2.27702 76.5553 2.01039 76.8217C0.91107 77.9209 0.91107 79.7001 2.01039 80.7994L9.96531 88.7545C10.5136 89.3027 11.2338 89.5769 11.9539 89.5769C12.6741 89.5769 13.3943 89.3027 13.9426 88.7545L50.6178 52.0781H93.1875V85.3596C93.1856 86.1321 92.5556 86.7638 91.7812 86.7658H44.3444C43.57 86.7638 42.94 86.1321 42.9381 85.3596V67.4251C42.9381 66.6507 42.3081 66.0188 41.5319 66.0188C40.7575 66.0188 40.1275 66.6489 40.1256 67.4214C40.1256 67.4232 40.1256 67.4251 40.1256 67.4251V85.3596C40.1256 86.4865 40.5644 87.5458 41.3612 88.3427C42.1581 89.1375 43.2175 89.5784 44.3444 89.5784H91.7812C94.1023 89.5784 96 87.7009 96 85.3596V50.6719C96 49.8893 95.3601 49.2656 94.5937 49.2656ZM23.6004 41.5794C24.0673 39.8369 26.2445 39.2516 27.5214 40.5286L32.9121 45.9193C30.9761 47.8552 28.7559 50.0754 26.4118 52.4198L28.1085 46.0875C28.3095 45.3371 27.8644 44.5661 27.1142 44.3651C26.364 44.1639 25.5928 44.6092 25.392 45.3594L23.7586 51.4553C22.9233 51.0692 22.0306 50.8547 21.1257 50.8159L23.6004 41.5794ZM19.6271 53.7942C21.1516 53.3494 22.7849 53.7812 23.8828 54.949C21.9104 56.9211 19.8944 58.9371 17.9225 60.9093C15.5397 58.6641 16.5243 54.6992 19.6271 53.7942ZM3.50252 64.5481C2.90346 63.9488 2.67658 63.1025 2.89596 62.284C3.11514 61.4656 3.73484 60.8461 4.55309 60.6267L13.7898 58.1519C13.8286 59.0567 14.0431 59.9494 14.429 60.7849L8.3333 62.4183C7.58292 62.6191 7.13779 63.3905 7.33898 64.1406C7.53998 64.8908 8.31099 65.336 9.06118 65.1352L15.3935 63.4385C13.0491 65.7828 10.8284 68.0037 8.89299 69.9389L3.50252 64.5481ZM11.9534 86.7658L3.99865 78.8109C4.29621 78.5134 6.57942 76.2302 9.8875 72.9221C9.8875 72.9219 9.8875 72.9219 9.8875 72.9219L9.88768 72.9217C12.4639 70.3454 32.7938 50.0153 35.8948 46.914L35.8952 46.9136C38.3614 44.4472 35.1516 47.6572 41.7839 41.0248L49.7399 48.9782L11.9534 86.7658ZM74.581 46.6012L71.8476 49.2658H61.5954C58.6565 46.4008 58.6783 46.5262 58.7722 46.2375C58.8673 45.945 58.728 46.0438 63.402 45.3647C63.8601 45.2983 64.2561 45.0105 64.4608 44.5953C66.5578 40.3466 66.4178 40.4617 66.7215 40.4617C67.0255 40.4617 66.8852 40.3466 68.982 44.5953C69.187 45.0105 69.5828 45.2981 70.0409 45.3647L74.3843 45.9958C74.6777 46.0384 74.7936 46.3939 74.581 46.6012Z"
                        fill="#977A4F"/>
                </g>
              </svg>
            </div>
            <div class="card__body">
              <div class="card__title">Бесплатный образец изделия</div>
              <div class="card__desc">
                <p>На следующий день после согласования макета,
                  отправляем бесплатный образец готового изделия.
                  Оцените качество нашей работы.</p>
              </div>
              <a href="#ex1" rel="modal:open" class="btn btn--light">Заказать образец</a>
            </div>
          </div>
        </div> -->
        <div class="card card--hr col-12">
          <div class="card__inner">
            <div class="card__image">
              <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path d="M77.7479 63.3669H68.2277V66.5403H77.7479V63.3669Z" fill="#977A4F" />
                  <path d="M65.0544 63.3669H55.5342V66.5403H65.0544V63.3669Z" fill="#977A4F" />
                  <path d="M52.3608 63.3669H42.8407V66.5403H52.3608V63.3669Z" fill="#977A4F" />
                  <path d="M93.5942 32.9072L62.1983 1.50652C61.3068 0.60647 60.092 0.100712 58.825 0.102299H58.8107C57.5521 0.102894 56.3466 0.60885 55.4644 1.50652L22.1597 34.8064H4.76007C2.13112 34.8064 0 36.9375 0 39.5665V83.9939C0 86.6228 2.13112 88.7539 4.76007 88.7539H28.2685L33.0032 93.4934C33.8947 94.3934 35.1095 94.8992 36.3765 94.8976H36.3892C37.6482 94.8972 38.8545 94.3913 39.7371 93.4934L44.4813 88.7539H80.9213C83.5502 88.7539 85.6813 86.6228 85.6813 83.9939V47.5539L93.5862 39.649C94.4885 38.7658 94.9978 37.5572 95 36.2947C95.0047 35.0226 94.4982 33.802 93.5942 32.9072ZM73.4099 17.21L55.8135 34.8064H42.3393L66.6728 10.4729L73.4099 17.21ZM57.7111 3.74376C58.3147 3.12554 59.3052 3.11364 59.9236 3.71738C59.9325 3.7261 59.9414 3.73483 59.95 3.74376L64.4292 8.22933L37.8505 34.8064H26.6469L57.7111 3.74376ZM37.4903 91.2561C37.2002 91.5592 36.7991 91.731 36.3797 91.7322C35.9544 91.7312 35.5474 91.5598 35.2499 91.2561L32.7572 88.7539H39.9941L37.4903 91.2561ZM82.5079 83.9939C82.5079 84.8701 81.7975 85.5806 80.9213 85.5806H4.76007C3.88382 85.5806 3.17338 84.8701 3.17338 83.9939V61.7802H82.5079V83.9939ZM82.5079 58.6068H3.17338V49.0866H82.5079V58.6068ZM82.5079 45.9133H3.17338V39.5665C3.17338 38.6902 3.88382 37.9798 4.76007 37.9798H80.9213C81.7975 37.9798 82.5079 38.6902 82.5079 39.5665V45.9133ZM91.3506 37.3975L85.6813 43.0667V39.5665C85.6813 36.9375 83.5502 34.8064 80.9213 34.8064H60.2943L75.6471 19.4536L91.3442 35.1507C91.6491 35.4494 91.8206 35.8584 91.8202 36.2852C91.8198 36.7041 91.6505 37.1051 91.3506 37.3975Z" fill="#977A4F" />
                  <path d="M15.218 82.4499C15.4496 82.2496 15.6666 82.0326 15.8669 81.801C17.9651 84.2449 21.5703 84.7092 24.2193 82.8767C25.9289 81.6814 26.9551 79.7331 26.9738 77.647C26.9738 74.1418 24.1322 71.3003 20.627 71.3003C20.312 71.2959 19.9975 71.3225 19.6877 71.3796L19.6464 71.3907C19.6306 71.3907 19.6147 71.3907 19.6004 71.3907C18.1468 71.6323 16.8249 72.3782 15.8669 73.4978C13.5741 70.8465 9.56597 70.5559 6.9148 72.8489C4.26344 75.1416 3.97288 79.1498 6.26585 81.801C8.55862 84.4523 12.5666 84.7429 15.218 82.4499ZM20.2256 74.507C20.3579 74.4818 20.4923 74.4707 20.627 74.4736C22.3797 74.4736 23.8004 75.8943 23.8004 77.647C23.7988 78.3184 23.58 78.9713 23.1768 79.5082C23.1197 79.586 23.0753 79.6669 23.0102 79.7478C22.9991 79.7605 22.9832 79.7684 22.9705 79.7811C22.3712 80.443 21.5199 80.8206 20.627 80.8204C18.8747 80.7905 17.4782 79.3458 17.5082 77.5935C17.5347 76.0375 18.6855 74.7303 20.2256 74.507ZM11.1068 74.4736C12.8595 74.4736 14.2802 75.8943 14.2802 77.647C14.2802 79.3997 12.8595 80.8204 11.1068 80.8204C9.35414 80.8204 7.93346 79.3997 7.93346 77.647C7.93346 75.8943 9.35414 74.4736 11.1068 74.4736Z" fill="#977A4F" />
                </g>
              </svg>
            </div>
            <div class="card__body">
              <div class="card__title">Оплатите ваш заказ</div>
              <div class="card__desc">
                <p>Без комиссии из любого региона России.</p>
                <p class="p--bold">Оплата на сайте без комиссии:</p>
              </div>
              <a href="#ex1" rel="modal:open" class="btn btn--light">Оплатить</a>
            </div>
          </div>
        </div>
        <div class="card card--hr col-12">
          <div class="card__inner">
            <div class="card__image">
              <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path d="M92.1992 21.1819L48.6114 0.139537C48.225 -0.0468379 47.775 -0.0468379 47.3888 0.139537L3.80081 21.1819C3.31481 21.4165 3.006 21.9087 3.006 22.4483V73.5512C3.006 74.0909 3.31481 74.583 3.80081 74.8176L47.3886 95.86C47.5817 95.9532 47.7909 95.9999 48 95.9999C48.2091 95.9999 48.4181 95.9532 48.6114 95.86L92.1992 74.8176C92.6852 74.583 92.994 74.0909 92.994 73.5512V22.4485C92.994 21.9085 92.685 21.4167 92.1992 21.1819ZM48 2.9676L88.3532 22.4483L76.6556 28.0954C76.5816 28.039 76.5034 27.9869 76.4175 27.9454L36.3384 8.59729L48 2.9676ZM33.1626 10.1873L73.4571 29.6397L65.2043 33.6239L24.9264 14.1794L33.1626 10.1873ZM74.3998 32.3074V47.0348L66.6911 50.7563V36.0289L74.3998 32.3074ZM90.1815 72.6689L49.4063 92.353V44.3732L59.1324 39.6779C59.8318 39.3402 60.1251 38.4996 59.7874 37.8C59.4497 37.1009 58.6091 36.8072 57.9096 37.1451L48 41.9292L44.1008 40.0467C43.4012 39.7086 42.5606 40.0022 42.2229 40.7016C41.8853 41.401 42.1785 42.2417 42.8779 42.5794L46.5938 44.3732V92.353L5.8185 72.6685V24.6887L36.8685 39.6784C37.0656 39.7737 37.2739 39.8187 37.4788 39.8187C38.0016 39.8187 38.5037 39.5258 38.7461 39.0235C39.0838 38.3241 38.7906 37.4834 38.0912 37.1457L7.64681 22.4483L21.6165 15.7043L63.8591 36.0974C63.8653 36.106 63.8723 36.1137 63.8786 36.1221V52.9969C63.8786 53.4809 64.1274 53.9307 64.5373 54.1881C64.7649 54.331 65.0246 54.4032 65.2851 54.4032C65.4936 54.4032 65.7026 54.3569 65.8963 54.2633L76.4175 49.1841C76.9035 48.9495 77.2123 48.4575 77.2123 47.9177V30.9499L90.1815 24.6889V72.6689Z" fill="#977A4F" />
                  <path d="M17.4236 67.2149L11.0271 64.1269C10.3273 63.7889 9.48694 64.0825 9.14925 64.7819C8.81156 65.4812 9.10481 66.322 9.80419 66.6597L16.2008 69.7476C16.3978 69.8429 16.6061 69.8879 16.8111 69.8879C17.3338 69.8879 17.8359 69.595 18.0784 69.0927C18.4163 68.3931 18.123 67.5527 17.4236 67.2149Z" fill="#977A4F" />
                  <path d="M23.3106 63.3828L11.0359 57.4571C10.3363 57.1194 9.49575 57.4127 9.15806 58.1122C8.82056 58.8116 9.11381 59.6523 9.81319 59.99L22.0879 65.9158C22.2849 66.0108 22.4933 66.056 22.6982 66.056C23.2209 66.056 23.7231 65.7632 23.9655 65.2608C24.3032 64.5611 24.0099 63.7203 23.3106 63.3828Z" fill="#977A4F" />
                </g>
              </svg>
            </div>
            <div class="card__body">
              <div class="card__title">Получите ваш заказ</div>
              <div class="card__desc">
                <p>Мы работаем со всем транспортными компаниями.
                  Выберем самый оптимальный вариант доставки и довезем до терминала в нашем городе бесплатно.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="#ex1" rel="modal:open" class="btn btn--light">Хочу заказать упаковку</a></div>
    </div>
  </section>

  <!-- <section class="section">
    <div class="container">
      <h2 class="section__title">Наши клиенты</h2>
      <div class="clients__list">
        <div class="clients__item">
          <div class="clients__item-inner">
            <img src="" alt="">
          </div>
        </div>
        <div class="clients__item">
          <div class="clients__item-inner">
            <img src="" alt="">
          </div>
        </div>
        <div class="clients__item">
          <div class="clients__item-inner">
            <img src="" alt="">
          </div>
        </div>
        <div class="clients__item">
          <div class="clients__item-inner">
            <img src="" alt="">
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <section class="section section--callback">
    <div class="section__inner container">

      <div class="caption">
        <h2 class="section__title">Хотите получить <br>Макет вашей упаковки?</h2>
        <p>Оставьте заявку сейчас и <br>мы сделаем расчет прямо сейчас</p>
      </div>

      <div class="form__wrapper">
        <form class="form">
          <input type="hidden" name="message" value="Заказ прайс листа">
          <p class="form-title">Заказать макет</p>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="ФИО" name="name" id="name">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Телефон" name="phone" id="phone">
          </div>
          <div class="form-group">
            <button class="btn btn--primary" type="submit" id="submit" onclick="yaCounter67210411.reachGoal('price-button'); return true;">Заказать
            </button>
          </div>
          <div class="messages"></div>
        </form>
      </div>
    </div>
  </section>
</main>
@endsection