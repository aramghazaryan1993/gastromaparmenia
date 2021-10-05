
 <div class="containerBig">
        <div class="uppage">
           <img id="up" src="{{ asset('web_sayt/imag/up.svg') }}" alt="imag">
        </div>
    </div>
    <footer id="contact">
        <div class="footer">
            <div class="containerBig">
                <div class=" foottitle">
                    <h2>{{__('site.Contact')}}</h2>
                </div>
                <div class="contact">
                    <div class="socialIcons">
                        <ul>
                            <li><a href="tel:{{ $ShowContact->phone }}"><img src="{{ asset('web_sayt/imag/mobile.png') }}" alt="">{{ $ShowContact->phone }}</a></li>
                            <li> <a href="mailto:{{ $ShowContact->email }}"><img src="{{ asset('web_sayt/imag/emailb.svg') }}" alt="img">{{ $ShowContact->email }}</a></li>
                        </ul>
                        <ul>
                            <li>
                                <a href="#"><img src="{{ asset('web_sayt/imag/vector.png') }}" alt="">
                                    @if(app()->getLocale() == 'am')
                                         {{ $ShowContact->adress_am }}
                                    @elseif(app()->getLocale() == 'en')
                                         {{ $ShowContact->adress_en }}
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li><a href="{{ $ShowContact->facebook }}" target="_blank">
                                    <svg class="facebk" id="Bold" enable-background="new 0 0 24 24" height="22" viewBox="0 0 24 24" width="22" fill='#000' xmlns="http://www.w3.org/2000/svg">
                                        <path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z" /></svg> Facebook
                                </a></li>
                            <li>
                                <a href="{{ $ShowContact->instagram }}" target="_blank" class="instagram">
                                    <svg class="facebk" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20" height="20" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-46.0041" y1="634.1208" x2="-32.9334" y2="647.1917" gradientTransform="matrix(32 0 0 -32 1519 20757)">
                                            <stop offset="0" style="stop-color:#000" />
                                            <stop offset="0.507" style="stop-color:#000" />
                                            <stop offset="0.99" style="stop-color:#000" />
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_1_);" d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192
  c88.352,0,160-71.648,160-160V160C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112
  V160C48,98.24,98.24,48,160,48h192c61.76,0,112,50.24,112,112V352z" />
                                        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="-42.2971" y1="637.8279" x2="-36.6404" y2="643.4846" gradientTransform="matrix(32 0 0 -32 1519 20757)">
                                            <stop offset="0" style="stop-color:#000" />
                                            <stop offset="0.507" style="stop-color:#000" />
                                            <stop offset="0.99" style="stop-color:#000" />
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_2_);" d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128
  S326.688,128,256,128z M256,336c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80
  C336,300.096,300.096,336,256,336z" />
                                        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-35.5456" y1="644.5793" x2="-34.7919" y2="645.3331" gradientTransform="matrix(32 0 0 -32 1519 20757)">
                                            <stop offset="0" style="stop-color:#000" />
                                            <stop offset="0.507" style="stop-color:#000" />
                                            <stop offset="0.99" style="stop-color:#000" />
                                        </linearGradient>
                                        <circle style="fill:url(#SVGID_3_);" cx="393.6" cy="118.4" r="17.056" />
                                        <g>
                                        </g>
                                    </svg>
                                    Instagram </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('web_sayt/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="{{ asset('web_sayt/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web_sayt/js/script.js') }}"></script>