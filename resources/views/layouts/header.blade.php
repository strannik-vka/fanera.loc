<header class="header">
    <div class="header__inner container">
        <nav class="header__nav">
            <ul class="nav__list">
                <li class="nav__item"><a href="{{ Route('home') }}#home" class="nav__link">Главная</a></li>
                @foreach($categories as $category)
                <li class="nav__item"><a href="{{ Route('category.show', $category['id']) }}" class="nav__link">{{ $category['name'] }}</a></li>
                @endforeach
                <li class="nav__item"><a href="#how_order" class="nav__link text-primary">Как сделать заказ?</a></li>
                @if(isset($setting->contact['phone']))
                <li class="nav__item"><a href="tel:{{ $setting->contact['phone'] }}" class="nav__link text-primary">{{ $setting->contact['phone'] }}</a></li>
                @endif
            </ul>
        </nav>
        <div class="header__socials">
            <ul class="socials__list">
                @if(isset($setting->contact['instagram']))
                <li class="socials__item">
                    <a href="{{ $setting->contact['instagram'] }}" class="socials__link" onclick="yaCounter67210411.reachGoal('Instagramm'); return true;" target="_blank">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle class="backdrop" cx="24.5" cy="24.5" r="24.5" fill="url(#paint0_linear)" />
                            <circle cx="24.5" cy="24.5" r="18.5" fill="url(#paint1_linear)" />
                            <path d="M24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM30.3042 16H19.2113C17.4407 16 16 17.4357 16 19.2001V30.2544C16 32.0189 17.4407 33.4545 19.2113 33.4545H30.3042C32.0748 33.4545 33.5155 32.0189 33.5155 30.2544V19.2001C33.5155 17.4357 32.0748 16 30.3042 16ZM24.7574 30.4733C21.5784 30.4733 18.9916 27.8955 18.9916 24.7269C18.9916 21.559 21.5784 18.9812 24.7574 18.9812C27.9371 18.9812 30.5239 21.559 30.5239 24.7269C30.5239 27.8955 27.9371 30.4733 24.7574 30.4733ZM30.709 20.1694C29.9567 20.1694 29.3447 19.5596 29.3447 18.8099C29.3447 18.0602 29.9567 17.4503 30.709 17.4503C31.4614 17.4503 32.0733 18.0602 32.0733 18.8099C32.0733 19.5596 31.4614 20.1694 30.709 20.1694ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM30.3042 16H19.2113C17.4407 16 16 17.4357 16 19.2001V30.2544C16 32.0189 17.4407 33.4545 19.2113 33.4545H30.3042C32.0748 33.4545 33.5155 32.0189 33.5155 30.2544V19.2001C33.5155 17.4357 32.0748 16 30.3042 16ZM24.7574 30.4733C21.5784 30.4733 18.9916 27.8955 18.9916 24.7269C18.9916 21.559 21.5784 18.9812 24.7574 18.9812C27.9371 18.9812 30.5239 21.559 30.5239 24.7269C30.5239 27.8955 27.9371 30.4733 24.7574 30.4733ZM30.709 20.1694C29.9567 20.1694 29.3447 19.5596 29.3447 18.8099C29.3447 18.0602 29.9567 17.4503 30.709 17.4503C31.4614 17.4503 32.0733 18.0602 32.0733 18.8099C32.0733 19.5596 31.4614 20.1694 30.709 20.1694ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM30.3042 16H19.2113C17.4407 16 16 17.4357 16 19.2001V30.2544C16 32.0189 17.4407 33.4545 19.2113 33.4545H30.3042C32.0748 33.4545 33.5155 32.0189 33.5155 30.2544V19.2001C33.5155 17.4357 32.0748 16 30.3042 16ZM24.7574 30.4733C21.5784 30.4733 18.9916 27.8955 18.9916 24.7269C18.9916 21.559 21.5784 18.9812 24.7574 18.9812C27.9371 18.9812 30.5239 21.559 30.5239 24.7269C30.5239 27.8955 27.9371 30.4733 24.7574 30.4733ZM30.709 20.1694C29.9567 20.1694 29.3447 19.5596 29.3447 18.8099C29.3447 18.0602 29.9567 17.4503 30.709 17.4503C31.4614 17.4503 32.0733 18.0602 32.0733 18.8099C32.0733 19.5596 31.4614 20.1694 30.709 20.1694ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM30.3042 16H19.2113C17.4407 16 16 17.4357 16 19.2001V30.2544C16 32.0189 17.4407 33.4545 19.2113 33.4545H30.3042C32.0748 33.4545 33.5155 32.0189 33.5155 30.2544V19.2001C33.5155 17.4357 32.0748 16 30.3042 16ZM24.7574 30.4733C21.5784 30.4733 18.9916 27.8955 18.9916 24.7269C18.9916 21.559 21.5784 18.9812 24.7574 18.9812C27.9371 18.9812 30.5239 21.559 30.5239 24.7269C30.5239 27.8955 27.9371 30.4733 24.7574 30.4733ZM30.709 20.1694C29.9567 20.1694 29.3447 19.5596 29.3447 18.8099C29.3447 18.0602 29.9567 17.4503 30.709 17.4503C31.4614 17.4503 32.0733 18.0602 32.0733 18.8099C32.0733 19.5596 31.4614 20.1694 30.709 20.1694ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097ZM30.3042 16H19.2113C17.4407 16 16 17.4357 16 19.2001V30.2544C16 32.0189 17.4407 33.4545 19.2113 33.4545H30.3042C32.0748 33.4545 33.5155 32.0189 33.5155 30.2544V19.2001C33.5155 17.4357 32.0748 16 30.3042 16ZM24.7574 30.4733C21.5784 30.4733 18.9916 27.8955 18.9916 24.7269C18.9916 21.559 21.5784 18.9812 24.7574 18.9812C27.9371 18.9812 30.5239 21.559 30.5239 24.7269C30.5239 27.8955 27.9371 30.4733 24.7574 30.4733ZM30.709 20.1694C29.9567 20.1694 29.3447 19.5596 29.3447 18.8099C29.3447 18.0602 29.9567 17.4503 30.709 17.4503C31.4614 17.4503 32.0733 18.0602 32.0733 18.8099C32.0733 19.5596 31.4614 20.1694 30.709 20.1694ZM24.7574 21.4097C22.9222 21.4097 21.4278 22.8981 21.4278 24.7269C21.4278 26.5565 22.9222 28.0456 24.7574 28.0456C26.5934 28.0456 28.087 26.5565 28.087 24.7269C28.087 22.8981 26.5934 21.4097 24.7574 21.4097Z" fill="white" />
                            <defs>
                                <linearGradient id="paint0_linear" x1="-9.5128e-07" y1="43.513" x2="56.114" y2="-4.01779" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFA800" />
                                    <stop offset="1" stop-color="#B31EE8" />
                                </linearGradient>
                                <linearGradient id="paint1_linear" x1="6" y1="38.8568" x2="48.3718" y2="2.96616" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFA800" />
                                    <stop offset="1" stop-color="#B31EE8" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </li>
                @endif
                @if(isset($setting->contact['vk']))
                <li class="socials__item">
                    <a href="{{ $setting->contact['vk'] }}" class="socials__link" onclick="yaCounter67210411.reachGoal('VK'); return true;" target="_blank">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle class="backdrop" cx="24.5" cy="24.5" r="24.5" fill="#278FDA" />
                            <circle cx="24.5" cy="24.5" r="18.5" fill="#278FDA" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.3149 30.9353H24.5751C24.5751 30.9353 24.9558 30.8936 25.1501 30.6848C25.329 30.4932 25.3233 30.1332 25.3233 30.1332C25.3233 30.1332 25.2986 28.4482 26.0834 28.2001C26.8571 27.9556 27.8505 29.8286 28.9035 30.5488C29.6997 31.0938 30.3048 30.9743 30.3048 30.9743L33.1202 30.9353C33.1202 30.9353 34.5931 30.8449 33.8947 29.6909C33.8375 29.5965 33.488 28.8372 31.8014 27.2771C30.036 25.6442 30.2724 25.9084 32.399 23.0839C33.6941 21.3637 34.2119 20.3136 34.0501 19.8638C33.8959 19.4354 32.9434 19.5486 32.9434 19.5486L29.7733 19.5683C29.7733 19.5683 29.5383 19.5364 29.364 19.6402C29.1937 19.742 29.0841 19.9793 29.0841 19.9793C29.0841 19.9793 28.5824 21.3104 27.9132 22.4424C26.5016 24.8311 25.9372 24.9572 25.7065 24.8088C25.1699 24.4632 25.3038 23.4201 25.3038 22.6791C25.3038 20.3643 25.6561 19.3992 24.6178 19.1493C24.2732 19.0663 24.0196 19.0116 23.1383 19.0027C22.0072 18.991 21.0498 19.0061 20.5078 19.2708C20.1471 19.4468 19.8689 19.839 20.0384 19.8615C20.2479 19.8895 20.7224 19.989 20.974 20.3304C21.2988 20.7708 21.2874 21.7599 21.2874 21.7599C21.2874 21.7599 21.474 24.4848 20.8515 24.8234C20.4242 25.0556 19.838 24.5815 18.5795 22.4145C17.9347 21.3044 17.4479 20.0774 17.4479 20.0774C17.4479 20.0774 17.354 19.8481 17.1866 19.7255C16.9833 19.5769 16.6994 19.5295 16.6994 19.5295L13.687 19.5492C13.687 19.5492 13.2348 19.5617 13.0688 19.7577C12.9211 19.932 13.0571 20.2925 13.0571 20.2925C13.0571 20.2925 15.4155 25.7908 18.0858 28.5617C20.5344 31.1021 23.3149 30.9353 23.3149 30.9353Z" fill="white" />
                        </svg>
                    </a>
                </li>
                @endif
                @if(isset($setting->contact['whatsapp']))
                <li class="socials__item">
                    <a href="{{ $setting->contact['whatsapp'] }}" class="socials__link" onclick="yaCounter67210411.reachGoal('WA'); return true;" target="_blank">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle class="backdrop" cx="24.5" cy="24.5" r="24.5" fill="#1BD741" />
                            <circle cx="24.5" cy="24.5" r="18.5" fill="#1BD741" />
                            <path d="M15 34.089L16.4054 29.0975C15.5016 27.5621 15.0258 25.8153 15.0258 24.0207C15.0258 18.4953 19.5211 14 25.0465 14C30.572 14 35.0672 18.4953 35.0672 24.0207C35.0672 29.5462 30.572 34.0415 25.0465 34.0415C23.3248 34.0415 21.639 33.6008 20.1476 32.7639L15 34.089ZM20.4107 30.9409L20.7175 31.1282C22.0178 31.922 23.5148 32.3416 25.0465 32.3416C29.6347 32.3416 33.3674 28.6089 33.3674 24.0207C33.3674 19.4326 29.6347 15.6998 25.0465 15.6998C20.4584 15.6998 16.7257 19.4326 16.7257 24.0207C16.7257 25.6194 17.18 27.1719 18.0395 28.5103L18.2461 28.8319L17.4368 31.7064L20.4107 30.9409Z" fill="white" />
                            <path d="M22.2315 19.3568L21.5813 19.3214C21.3771 19.3102 21.1767 19.3785 21.0224 19.5126C20.7071 19.7863 20.2031 20.3155 20.0483 21.0052C19.8174 22.0334 20.1742 23.2926 21.0976 24.5517C22.021 25.8109 23.7418 27.8255 26.7847 28.686C27.7653 28.9632 28.5366 28.7763 29.1318 28.3956C29.6031 28.0941 29.9281 27.6101 30.0452 27.063L30.149 26.5781C30.182 26.424 30.1037 26.2676 29.9605 26.2017L27.763 25.1887C27.6204 25.123 27.4512 25.1646 27.3552 25.2889L26.4925 26.4073C26.4274 26.4918 26.3158 26.5253 26.2151 26.4899C25.6243 26.2822 23.6453 25.4534 22.5594 23.3617C22.5123 23.271 22.524 23.1609 22.5908 23.0835L23.4153 22.1297C23.4995 22.0323 23.5208 21.8954 23.4702 21.777L22.523 19.5609C22.4725 19.4429 22.3595 19.3638 22.2315 19.3568Z" fill="white" />
                        </svg>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="header__nav-toggler">
            <button class="nav-toggler" type="button"><span></span></button>
        </div>
    </div>
</header>

<div class="mobile-menu">
    <div class="mobile-menu__inner">
        <ul class="nav__list">
            <li class="nav__item"><a href="{{ Route('home') }}#home" class="nav__link">Главная</a></li>
            @foreach($categories as $category)
            <li class="nav__item"><a href="{{ Route('category.show', $category['id']) }}" class="nav__link">{{ $category['name'] }}</a></li>
            @endforeach
            <li class="nav__item"><a href="#how_order" class="nav__link text-primary">Как сделать заказ?</a></li>
            @if(isset($setting->contact['phone']))
            <li class="nav__item"><a href="tel:{{ $setting->contact['phone'] }}" class="nav__link text-primary">{{ $setting->contact['phone'] }}</a></li>
            @endif
        </ul>
    </div>
</div>