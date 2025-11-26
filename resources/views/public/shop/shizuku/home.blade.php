<x-shizuku-layout>
    <div class="home">
        <div class="home-gradient-overlay"></div>

        <!-- Menu Overlay -->
        <div class="menu-overlay" id="menuOverlay">
            <div class="menu-overlay-content">
                <button class="menu-close" id="menuClose">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M38.5 13.625L36.375 11.5L25 22.875L13.625 11.5L11.5 13.625L22.875 25L11.5 36.375L13.625 38.5L25 27.125L36.375 38.5L38.5 36.375L27.125 25L38.5 13.625Z"
                            fill="#000000" />
                    </svg>
                </button>
                <button class="menu-close-mobile" id="menuCloseMobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61" fill="none">
                        <rect width="60.5424" height="60.5424" transform="translate(0 -0.000359654)" fill="#160B00"/>
                        <path d="M48.028 13.4996L14.028 45.4996" stroke="#FFDA89" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.028 13.4996L48.028 45.4996" stroke="#FFDA89" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="menu-logo">
                    <img src="{{ asset('assets/img/shops/shizuku/footer-logo-black.png') }}" alt="Shizuku Logo">
                </div>

                <div class="menu-grid">
                    <div class="menu-column">
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
                                <path d="M21.1581 22H14.5511V16.3771H10.4094V22H3.80246V13.6142L12.5296 5.1333L21.1581 13.6142V22Z" fill="#8A6620"/>
                                <path d="M12.4448 0L24.9606 12.2094C25.0266 12.2821 25 12.3267 24.9606 12.4014C24.9073 12.5022 23.4301 13.9564 23.3266 14.0078L12.5158 3.58701L1.82924 14.0078C1.75529 14.0727 1.70992 14.0465 1.63399 14.0078C1.53144 13.9554 0.0522641 12.5031 0 12.4014L12.4448 0Z" fill="#8A6620"/>
                              </svg>
                            <span>TOPページ</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="25" viewBox="0 0 19 25" fill="none">
                                <path d="M2.59857 0L3.74881 0.488281L9.53603 5.85059L15.2512 0.488281L16.4015 0H16.9016C18.2469 0.348633 18.786 1.05078 18.9 2.39355C18.675 6.63477 19.2051 11.1758 18.906 15.3818C18.766 17.3516 18.1088 17.6064 16.8486 18.8408C15.1602 20.4951 13.0978 22.7129 11.3014 24.166C10.7993 24.5723 10.3402 24.835 9.70007 24.9951C9.57004 24.9844 9.42701 25.0117 9.29998 24.9951C8.72886 24.9189 8.23276 24.6123 7.79867 24.2637C6.0583 22.8662 4.08688 20.7285 2.45154 19.1338C1.10526 17.8213 0.244075 17.4961 0.0940434 15.3818C-0.20502 11.1758 0.325092 6.63477 0.100045 2.39355C0.212068 1.06836 0.783189 0.352539 2.09847 0H2.59857ZM9.50002 21.4795C10.6523 20.6318 11.6155 19.5371 12.6477 18.5479C13.2328 17.9883 15.4883 16.1455 15.6543 15.5264L15.6493 5.37207C15.4193 5.01855 15.0462 4.97949 14.7061 5.22852L9.50102 10.2031L9.50002 21.4795Z" fill="#52B845"/>
                            </svg>
                            <span>新人情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" viewBox="0 0 22 25" fill="none">
                                <path d="M10.9016 0.00805664C12.3237 0.177979 12.8743 1.80591 12.0609 2.93481C15.4556 3.38208 18.2079 6.27954 18.5209 9.73071C18.7305 12.0393 18.0157 14.5999 19.2097 16.6956H2.78674C3.95857 14.6233 3.28619 12.0999 3.46491 9.81665C3.72092 6.53833 6.32058 3.5686 9.54914 3.03149C8.59081 1.91919 9.11441 0.187744 10.6118 0.00805664C10.6978 -0.00268555 10.8156 -0.00268555 10.9016 0.00805664Z" fill="#FFD775"/>
                                <path d="M10.6118 24.9915C10.4524 24.9778 9.91723 24.8186 9.74237 24.7473C9.0188 24.4504 8.56571 23.677 8.38989 22.9426H13.1236C12.8763 23.9993 12.1015 24.8586 10.9982 24.9924C10.8862 25.0061 10.7277 25.0012 10.6118 24.9915Z" fill="#FFD775"/>
                                <path d="M1.40913 17.9875L20.4182 17.9641C22.4276 18.1926 22.5551 20.9377 20.6134 21.3821H1.38401C-0.464057 20.9348 -0.466955 18.4104 1.40913 17.9875Z" fill="#FFD775"/>
                            </svg>
                            <span>イベント情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 25 21" fill="none">
                                <path d="M0 7.32623C0.739258 -1.60843 15.9629 -2.46838 18.8115 5.28275C21.5049 12.6121 12.418 15.3634 7.0459 16.5411C5.52246 16.8753 3.88867 17.1873 2.34277 17.1979L3.89062 13.7398C2.74805 12.9742 1.75781 12.1595 1.03223 10.9769C0.491211 10.0939 0.0332031 8.84294 0 7.80772V7.32623ZM4.49023 15.7033C7.29785 15.2603 10.1689 14.5005 12.8115 13.4653C16.3828 12.0651 19.5264 8.9065 17.1963 4.95052C14.2871 0.0132537 5.04883 0.00554991 2.10645 4.92645C0.0878906 8.30174 2.25391 11.7213 5.55762 13.1109L4.49023 15.7033Z" fill="#8A6B20"/>
                                <path d="M24.9883 13.682C25.0059 13.8515 25 14.0864 24.9883 14.2598C24.9648 14.5988 24.8076 15.2199 24.6982 15.5627C24.3096 16.7819 23.2871 17.7227 22.2695 18.4459L23.4268 20.9988C21.2646 20.9121 19.0811 20.4018 17.0312 19.7498C14.9814 19.0979 12.7432 18.2947 11.7129 16.283L12.8379 15.7158C13.4619 16.7299 14.3672 17.3616 15.4531 17.8392C16.1191 18.132 21.0098 19.6988 21.2783 19.458L20.5957 17.8229C25.0723 16.179 24.3418 11.0963 19.9121 10.0188L20.2061 8.86605C21.9258 9.15495 23.8154 10.4743 24.5186 12.0757C24.6865 12.458 24.9473 13.2862 24.9883 13.682Z" fill="#8A6B20"/>
                                <path d="M9.63867 6.76865C11.2354 6.46627 11.3115 8.9845 9.7207 8.7659C8.60254 8.61279 8.58398 6.96896 9.63867 6.76865Z" fill="#8A6B20"/>
                                <path d="M13.7402 6.76673C14.7881 6.6165 15.4229 7.93484 14.4951 8.57812C13.0898 9.5517 12.1162 6.99977 13.7402 6.76673Z" fill="#8A6B20"/>
                                <path d="M6.60742 7.06718C7.46191 8.02055 6.0127 9.44096 5.12012 8.48663C4.11914 7.41675 5.75879 6.12056 6.60742 7.06718Z" fill="#8A6B20"/>
                            </svg>
                            <span>口コミ一覧</span>
                        </a>
                        <a href="#" class="menu-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none">
                            <path d="M0 6.5519L2.38086 0.000897397H5.03125L3.35387 7.16482C3.12926 7.74364 2.69801 8.05773 2.15625 8.30182V19.5642H11.6797V11.9363H18.2383V19.5642H20.8438V8.30182C20.3559 8.07747 19.8114 7.71762 19.6461 7.16482C19.5743 6.92522 19.6048 6.6883 19.5455 6.45767C18.9993 4.3111 18.4737 2.15734 17.9688 0.000897397H20.6191L23 6.5519V6.82112C22.841 7.07598 22.8589 7.3452 22.6649 7.60814C22.5723 7.73287 22.2812 7.91774 22.2812 7.94287V21H0.71875V8.03261C0.71875 7.99402 0.325234 7.63775 0.233594 7.44032C0.116797 7.18726 0.134766 6.94765 0 6.73138V6.5519ZM17.1602 13.0132H12.7578V19.5642H17.1602V13.0132Z" fill="#8A6B20"/>
                            <path d="M12.8477 0.000897397L13.1989 6.85791C12.8099 8.79898 10.1901 8.79898 9.80016 6.85791L10.1523 0.000897397H12.8477Z" fill="#8A6B20"/>
                            <path d="M8.98438 0.000897397C8.7373 1.5166 8.69777 3.08705 8.53516 4.62249C8.46238 5.30631 8.41387 6.59677 8.2234 7.18277C7.67984 8.85283 5.05102 8.56656 4.93602 6.77804L6.19922 0.000897397H8.98438Z" fill="#8A6B20"/>
                            <path d="M16.8008 0.000897397L18.0649 6.77715C18.02 7.87736 16.8116 8.5531 15.8125 8.21119C14.6176 7.80197 14.6751 6.56895 14.5547 5.51899C14.3445 3.68741 14.313 1.81185 14.0156 0L16.8008 0.000897397Z" fill="#8A6B20"/>
                            <path d="M8.71484 11.3978H4.94141V15.2567H8.71484V11.3978Z" fill="#8A6B20"/>
                        </svg>
                            <span>店舗一覧</span>
                        </a>
                    </div>

                    <div class="menu-column">
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="23" viewBox="0 0 21 23" fill="none">
                                <path d="M2.01123 23C0.795273 22.7404 0.127176 22.0539 0.0186893 20.8024C0.114519 15.1935 -0.158505 9.53781 0.158818 3.95402C0.251936 3.42664 1.30245 2.51562 1.78521 2.51562H4.09055V4.62695C4.09055 4.89648 4.76046 5.4068 5.0606 5.4598C5.60304 5.55504 7.2674 5.54156 7.84238 5.48047C8.32876 5.42836 8.66055 5.23699 8.8721 4.79676C8.90736 4.72309 9.06286 4.30082 9.06286 4.26758V2.51562H11.9558V4.26758C11.9558 4.82371 12.5245 5.41578 13.0841 5.48227C13.6437 5.54875 15.4428 5.55234 15.9581 5.4598C16.2781 5.4023 16.9281 4.945 16.9281 4.62695V2.51562H19.2335C19.2895 2.51562 19.9341 2.82559 20.0318 2.89027C20.642 3.29277 20.896 3.92797 20.9955 4.62785L21 20.8024C20.9376 21.992 20.1014 22.8661 18.9171 23H2.01123ZM19.4595 7.99609H1.5592V20.9785C1.5592 21.1843 2.07722 21.558 2.32313 21.4771H18.6043C18.8682 21.5293 19.4595 21.2418 19.4595 20.9785V7.99609Z" fill="#1D47AA"/>
                                <path d="M15.3008 0C15.6109 0.1725 15.9572 0.380039 16.0187 0.769063C16.072 1.10598 16.0593 4.23973 15.9789 4.40324C15.9057 4.55148 15.7664 4.56766 15.6209 4.58652C14.8515 4.68535 13.7251 4.57125 12.9494 4.49219V0.583984C12.9494 0.364766 13.4322 0.134766 13.5822 0H15.3008Z" fill="#1D47AA"/>
                                <path d="M7.34515 0C7.67694 0.1725 7.96172 0.269531 8.06388 0.67832L8.05031 4.33945C8.00059 4.4868 7.89753 4.55238 7.74926 4.57934C7.49613 4.62605 5.32097 4.60809 5.17452 4.53711C5.07145 4.4877 5.01088 4.37629 4.99642 4.26488C5.08592 3.18586 4.86714 1.90379 4.9919 0.851719C5.04614 0.394414 5.34719 0.203047 5.71695 0H7.34515Z" fill="#1D47AA"/>
                                <path d="M16.6569 9.97266H4.36177V11.5898H16.6569V9.97266Z" fill="#1D47AA"/>
                                <path d="M16.6569 13.5664H4.36177V15.0938H16.6569V13.5664Z" fill="#1D47AA"/>
                                <path d="M13.2215 17.1602H4.36177V18.6875H13.2215V17.1602Z" fill="#1D47AA"/>
                            </svg>
                            <span>出勤情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path d="M7.68904 19.2688C7.0748 18.0755 6.12269 17.1995 4.69013 17.2806C4.11398 17.3128 3.57201 17.639 3.03004 17.6761C1.87188 17.7552 2.31034 17.0706 2.17949 16.2816C2.11211 15.8744 1.83575 15.7133 1.76935 15.5297C1.72345 15.4008 1.85235 15.1146 1.81427 14.8939C1.77814 14.686 1.56233 14.5981 1.55061 14.5024C1.53987 14.4047 1.69416 14.1684 1.71076 14.0004C1.81232 12.9721 0.86704 12.8286 0.830909 12.4448C0.808449 12.2026 1.38167 11.6831 1.5594 11.4156C2.15898 10.5123 2.3621 9.58166 2.30155 8.49479L3.37378 9.37366C3.26831 8.76821 3.198 6.29468 3.81517 6.05445L5.62271 8.73599C6.25062 9.526 7.35604 10.7027 8.32769 11.0113C8.78275 11.1558 9.15968 11.064 9.52198 11.1841C9.99461 11.3414 10.812 12.4429 11.3334 12.6929C11.476 11.8169 12.2055 9.42346 13.4359 9.80626C14.2581 10.0621 13.8695 11.6763 13.6449 12.272C13.4798 12.7095 12.8051 13.6381 12.7533 13.9194C12.6283 14.5912 12.8519 15.5551 12.7426 16.2523C12.6869 16.6058 12.3519 16.9593 12.2836 17.3558C11.9398 19.3645 13.6078 22.3165 15.4817 23.1427L15.7708 22.3692C14.2747 21.7716 12.8597 19.1682 13.0502 17.6341C13.1752 16.6263 16.0637 13.2622 16.7688 11.978C18.3185 9.15785 18.2892 6.35229 16.5569 3.61314C18.8995 4.05062 19.3985 5.64431 18.8283 7.78778C18.0216 10.8209 15.6702 14.3627 17.1887 17.5794C17.5949 18.4397 19.0411 19.9201 20.0235 19.9201H22.0254C21.2813 18.9163 20.4444 17.888 20.1964 16.6224C19.6271 13.7133 21.9131 11.7759 22.8808 9.30237C24.1376 6.08863 23.7704 2.26261 20.3331 0.666966C17.9523 -0.437483 16.5168 0.412093 14.261 1.22944C13.679 0.942346 13.1332 0.586891 12.5072 0.38768C11.9115 0.198234 11.2983 0.151361 10.6977 0H9.42823L6.88927 0.537088C5.82095 1.00484 4.77997 1.32612 3.68138 1.62591C1.68439 2.17081 -0.25694 3.69614 0.564317 5.98316C0.738139 6.46752 1.17367 6.89426 1.29964 7.29854C1.35823 7.48799 1.54963 8.88735 1.52424 9.02992C1.50959 9.11 1.49885 9.18226 1.42268 9.22913C0.976411 9.40979 0.54381 9.52404 0.0545717 9.47229C0.29675 9.80626 0.821143 9.84532 1.17953 9.9586C1.29085 9.99375 1.35237 9.88633 1.32405 10.1051C1.19515 11.1148 -0.594817 11.9507 0.204956 13.0815C0.387567 13.3393 0.811378 13.4585 0.894383 13.7661C0.969575 14.0444 0.621932 14.2699 0.641463 14.5912C0.660017 14.8998 0.98227 15.0512 1.00864 15.1957C1.03696 15.3529 0.876805 15.5345 0.973481 15.8256C1.05551 16.0716 1.31624 16.0736 1.38069 16.2992C1.5594 16.9251 1.19222 17.5569 1.80743 18.1204C3.1023 19.3039 4.90301 16.9378 6.49768 18.8987C7.62654 20.2863 8.39604 22.9571 6.91954 24.3653L7.3785 25H7.47616C9.02492 23.251 8.68216 21.1994 7.68904 19.2698V19.2688Z" fill="#B31723"/>
                            </svg>
                            <span>キャスト一覧</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="23" viewBox="0 0 19 23" fill="none">
                                <path d="M15.2649 0C15.7446 0.120391 16.207 0.16082 16.673 0.355781C17.7946 0.823867 18.6025 1.86336 18.8691 3.02055C19.1311 7.88738 18.9053 12.7955 18.9869 17.6777L18.8963 17.9463L13.9049 22.9075C10.6661 22.6891 7.03203 23.1995 3.84043 22.9075C2.09412 22.7475 0.633416 21.585 0.236279 19.8869C0.291588 14.6984 -0.224327 9.04996 0.118407 3.88844C0.258947 1.77441 1.65437 0.199453 3.84043 0H15.2649ZM13.3608 21.4754V18.9247C13.3608 18.4243 14.4326 17.3587 14.9476 17.3587H17.4863L17.6223 17.2248V3.80309C17.6223 2.73395 16.5824 1.5534 15.4916 1.43121H3.61375C2.21652 1.69445 1.58092 2.73754 1.47937 4.06812C1.11578 8.8568 1.75773 14.0893 1.4839 18.9238C1.5646 19.7575 1.85747 20.5715 2.57648 21.0666C2.68529 21.142 3.35988 21.4754 3.43241 21.4754H13.3608Z" fill="#A30ABA"/>
                                <path d="M13.633 14.9437H5.47267C5.41283 13.3346 6.67677 11.5871 8.35236 11.3877C8.84833 11.3284 9.27448 11.482 9.78314 11.4569C10.4505 11.4245 10.5167 11.2323 11.2738 11.5009C12.7145 12.0112 13.6693 13.4406 13.633 14.9437Z" fill="#A30ABA"/>
                                <path d="M9.1684 5.7509C12.4398 5.29449 12.6656 10.3599 9.9536 10.73C6.6677 11.1784 6.4238 6.13363 9.1684 5.7509Z" fill="#A30ABA"/>
                            </svg>
                            <span>写メ日記</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                <path d="M22.9831 12.0475C23.0074 12.2684 23.0038 12.6444 22.9831 12.8689C22.9589 13.14 22.8295 13.6739 22.7594 13.9641C22.3434 15.6891 21.3112 17.3265 20.2474 18.7101H17.0625C18.1172 16.1601 19.34 13.6337 19.8153 10.8774C19.95 10.0943 20.0021 9.31125 20.1037 8.52452C20.4388 8.0919 21.3309 8.84943 21.5969 9.12232C22.2842 9.82783 22.8753 11.06 22.984 12.0466L22.9831 12.0475Z" fill="#D6AD01"/>
                                <path d="M0.0139126 11.865C0.0938727 11.0928 0.527813 10.0578 1.00308 9.44815C1.2798 9.09403 2.47291 7.79801 2.89338 8.34198C2.9949 9.1278 3.04701 9.9118 3.18177 10.6949C3.65794 13.4549 4.88519 15.9721 5.93455 18.5276H2.75052C1.69038 17.154 0.656289 15.4965 0.237621 13.7825C0.161255 13.4704 0.0354749 12.8926 0.0139126 12.5951C-0.0013607 12.3834 -0.0076497 12.0721 0.0139126 11.865Z" fill="#D6AD01"/>
                                <path d="M12.9342 18.7101V8.25983C12.9342 7.84273 13.3825 7.20933 13.7122 6.95195C15.3312 5.69244 17.836 6.66993 18.1145 8.739C18.2691 9.88716 17.7704 11.6295 17.4434 12.7557C16.8478 14.8075 15.9781 16.8017 15.0419 18.7092H12.9333L12.9342 18.7101Z" fill="#D6AD01"/>
                                <path d="M10.0637 18.5276H7.95512C7.02525 16.6164 6.15197 14.6249 5.55362 12.5741C5.2257 11.4515 4.72886 9.7028 4.8825 8.55737C5.16101 6.48648 7.66672 5.50169 9.28479 6.77033C9.59116 7.01036 10.0628 7.69579 10.0628 8.07821V18.5285L10.0637 18.5276Z" fill="#D6AD01"/>
                                <path d="M20.1118 20.1704H2.88529V22.9998H20.1118V20.1704Z" fill="#D6AD01"/>
                                <path d="M12.3062 0V2.00792H14.3699V3.74202H12.3062V5.74994H10.6917V3.74202H8.62804V2.00792H10.6917V0H12.3062Z" fill="#D6AD01"/>
                                <path d="M11.8363 9.24097C12.1121 9.52299 11.9693 10.1263 11.4509 10.1153C10.6181 10.098 11.2101 8.60118 11.8363 9.24097Z" fill="#D6AD01"/>
                                <path d="M11.8354 7.14088C12.0654 7.34532 11.9971 8.00793 11.5381 8.02527C10.5911 8.06269 11.1706 6.54945 11.8354 7.14088Z" fill="#D6AD01"/>
                                <path d="M11.3871 11.2407C12.158 11.1047 12.1005 12.1579 11.53 12.2109C11.0376 12.2565 10.7816 11.3484 11.3871 11.2407Z" fill="#D6AD01"/>
                                <path d="M11.3871 13.3399C12.158 13.2039 12.1005 14.2571 11.53 14.31C11.0376 14.3557 10.7816 13.4476 11.3871 13.3399Z" fill="#D6AD01"/>
                                <path d="M11.2928 15.4418C12.14 15.1826 12.2245 16.4795 11.3691 16.3371C10.9325 16.265 10.9352 15.5513 11.2928 15.4418Z" fill="#D6AD01"/>
                                <path d="M11.2928 17.541C12.14 17.2818 12.2245 18.5787 11.3691 18.4363C10.9325 18.3642 10.9352 17.6505 11.2928 17.541Z" fill="#D6AD01"/>
                              </svg>
                            <span>女の子ランキング</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="25" viewBox="0 0 21 25" fill="none">
                                <path d="M20.9981 0L21 20.9277L15.0262 25H14.9298C14.8412 24.9092 14.4482 24.7656 14.4482 24.6582V21.0449L14.3038 20.8984H5.68298V13.7695H7.22413V19.3359H14.3038L14.4482 19.1895V4.93164C14.4482 4.70508 14.8971 4.25977 15.0763 4.10352C16.0298 3.27539 17.4496 2.59668 18.4677 1.78613C18.5467 1.72363 18.644 1.79004 18.5901 1.5625H7.36861L7.22413 1.70898V8.49609H5.68298V0H20.9981Z" fill="black"/>
                                <path d="M9.24686 14.3555V12.6465L9.10238 12.5H0V9.76562H9.24686V7.91016L9.68512 8.00293L13.1883 11.0977C13.2114 11.2324 12.9957 11.3896 12.908 11.4756C12.2174 12.1484 10.4778 13.7119 9.72365 14.2041C9.5705 14.3047 9.44046 14.3828 9.24686 14.3555Z" fill="black"/>
                            </svg>
                            <span>ログイン</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
                                <path d="M23 15.6376L16.7604 21.8471L16.5735 21.9299C13.977 21.7779 11.1442 22.1385 8.57648 21.9353C6.96738 21.8076 5.12109 20.3534 5.12109 18.6493V14.018C5.80211 14.6754 7.11113 15.4802 6.20101 16.491C6.25762 16.5836 6.44629 16.589 6.47055 16.6889C6.58285 17.143 6.40676 18.1016 6.46875 18.6493C6.58555 19.6871 7.72836 20.6727 8.75977 20.6727H16.082V17.0306C16.082 16.9191 16.2473 16.3165 16.3057 16.1754C16.4612 15.7977 17.2707 15.0971 17.6543 15.0971H21.6523V3.18255C21.6523 3.13219 21.39 2.52428 21.3316 2.42446C20.8375 1.57734 19.9345 1.30486 19.0064 1.2446C15.7128 1.03058 12.1801 1.40378 8.86129 1.26079C8.02305 1.16097 6.46875 2.25629 6.46875 3.09263V6.375L5.13906 5.05306C4.79227 2.68795 5.80391 0.394784 8.31953 0L19.9489 0.0305755C21.1492 0.258094 22.1941 1.04406 22.6559 2.17716L22.9991 3.4973L23 15.6376Z" fill="black"/>
                                <path d="M0 6.55486V6.375C0.35668 5.90468 1.4968 4.5027 2.05473 4.44245C2.52191 4.39209 3.05828 5.2527 3.41227 5.52068L1.12305 7.81205L0 6.55486Z" fill="black"/>
                                <path d="M3.83094 6.02158L11.4937 13.6259L9.28715 15.9002L1.62348 8.29586L3.83094 6.02158ZM3.9082 6.91637C3.78961 7.08723 3.34219 7.32644 3.45359 7.54317L10.2413 14.1592L10.6896 13.7041L3.9082 6.91637Z" fill="black"/>
                                <path d="M19.3164 5.38579H11.5898V6.64478H19.3164V5.38579Z" fill="black"/>
                                <path d="M19.3164 9.70234H11.5898V8.53327H19.1816C19.2086 8.53327 19.2508 8.41906 19.3164 8.44335V9.70234Z" fill="black"/>
                                <path d="M19.3164 11.5908H13.0273V12.7599H19.3164V11.5908Z" fill="black"/>
                                <path d="M12.128 14.2896L12.8468 17.2563L9.88281 16.5369C9.84238 16.3813 9.9475 16.357 10.0167 16.2671C10.323 15.8687 11.4605 14.7302 11.8585 14.4236C11.9483 14.3543 11.9726 14.2491 12.128 14.2896Z" fill="black"/>
                                <path d="M10.0625 5.47572H8.80469V6.64478H10.0625V5.47572Z" fill="black"/>
                                <path d="M10.0625 8.53327H8.80469V9.70234H10.0625V8.53327Z" fill="black"/>
                            </svg>
                            <span>会員新規登録</span>
                        </a>
                    </div>

                    <div class="menu-column">
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 20 25" fill="none">
                                <path d="M5.33981 0L9.95243 8.49707L14.6602 0H20L14.5631 10.0586H19.2233V13.8672H12.8155V16.2598L12.9612 16.4062H19.2233V20.1172H12.8155V25H7.18447V20.1172H0.776699V16.4062H7.03883L7.18447 16.2598V13.8672H0.776699V10.0586H5.43689L0 0H5.33981Z" fill="#DCC305"/>
                            </svg>
                            <span>料金システム</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none">
                                <path d="M0.0971798 7.23882C0.197765 6.49834 1.09132 5.31048 1.896 5.31048H8.16843V14.5665H1.79932C1.73389 14.5665 1.17725 14.2917 1.07667 14.2233C0.57374 13.882 0.173351 13.1328 0.0981564 12.5418C-0.0297727 11.5487 -0.0356321 8.22228 0.0981564 7.23882H0.0971798Z" fill="#8A6620"/>
                                <path d="M24.9926 9.9385C24.9779 10.0947 25.015 10.2721 24.9926 10.4206C24.8754 11.2141 24.1186 12.2226 23.2426 12.2525V8.203C24.1781 8.22324 24.7523 9.13921 24.9926 9.9385Z" fill="#8A6620"/>
                                <path d="M9.35202 14.6475L9.34909 5.22756L21.8354 0.000786746C22.0942 -0.0136758 22.2309 0.173373 22.3227 0.38742L22.3715 19.1502C22.3764 19.6969 22.0317 20.0228 21.4887 19.8232L9.353 14.6466L9.35202 14.6475Z" fill="#8A6620"/>
                                <path d="M7.29344 15.7235L9.14011 22.1256C9.05515 22.5219 8.80417 22.8497 8.38914 22.9326C7.93894 23.0223 6.36668 23.0127 5.87743 22.9606C5.55614 22.9269 5.3872 22.8362 5.15185 22.6193L3.40381 15.7226H7.29344V15.7235Z" fill="#8A6620"/>
                            </svg>
                            <span>新着情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                                <path d="M25 0V18H0V0H25ZM3.78516 1.724C3.58984 1.524 2.16406 1.515 2.00098 1.799C1.92578 1.93 1.91406 3.881 1.94922 4.155C1.96973 4.316 1.9873 4.47 2.14844 4.551C2.38184 4.667 3.64648 4.669 3.80176 4.443C3.96973 4.199 3.97461 1.919 3.78516 1.724ZM21.2148 1.724C21.0244 1.919 21.0312 4.199 21.1992 4.443C21.3545 4.669 22.6191 4.667 22.8525 4.551C23.0137 4.47 23.0312 4.316 23.0518 4.155C23.0859 3.881 23.0752 1.93 23 1.799C22.8359 1.515 21.4092 1.524 21.2148 1.724ZM9.92969 5.113C9.69043 5.24 9.68555 5.503 9.66406 5.745C9.47559 7.877 9.81738 10.291 9.66406 12.454C9.66602 12.783 9.89258 12.947 10.1953 12.899L16.3975 9.236C16.5615 9.007 16.4658 8.766 16.2451 8.614L10.4893 5.21L9.92969 5.112V5.113ZM2.2168 7.32C2.05859 7.368 1.98438 7.494 1.95605 7.653C1.90918 7.909 1.92285 9.835 2.00195 10.001C2.13379 10.279 3.4668 10.273 3.71191 10.151C3.87305 10.07 3.89062 9.916 3.91113 9.755C3.94727 9.467 3.94141 7.675 3.8584 7.5C3.72754 7.224 2.4873 7.239 2.21777 7.321L2.2168 7.32ZM21.3574 7.32C21.1992 7.368 21.125 7.494 21.0967 7.653C21.0498 7.909 21.0635 9.835 21.1426 10.001C21.2744 10.279 22.6074 10.273 22.8525 10.151C23.0137 10.07 23.0312 9.916 23.0518 9.755C23.0879 9.467 23.082 7.675 22.999 7.5C22.8682 7.224 21.6279 7.239 21.3584 7.321L21.3574 7.32ZM3.78516 13.524C3.46289 13.359 2.16016 13.267 2.00098 13.6C1.91797 13.774 1.91113 15.661 1.94824 15.955C1.96875 16.116 1.98633 16.27 2.14746 16.351C2.37012 16.462 3.67578 16.461 3.81543 16.234C3.9668 15.99 3.96973 13.713 3.78516 13.524ZM21.2148 16.276C21.4102 16.476 22.8359 16.485 22.999 16.201C23.0742 16.07 23.0859 14.119 23.0508 13.845C23.0303 13.684 23.0127 13.53 22.8516 13.449C22.6182 13.333 21.3535 13.331 21.1982 13.557C21.0303 13.801 21.0254 16.081 21.2148 16.276Z" fill="black"/>
                            </svg>
                            <span>MOVIE一覧</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="25" viewBox="0 0 17 25" fill="none">
                                <path d="M8.87608 0C14.4972 0.447211 17.9828 5.43426 16.7536 10.9592C16.1434 13.7012 14.0733 15.1355 12.3914 17.1305C10.5174 19.3526 8.97018 22.0757 8.57794 25C8.28277 24.6833 8.26593 24.0498 8.1332 23.6056C6.87823 19.4124 5.07649 17.9373 2.38726 14.8416C-2.53259 9.17928 0.535011 0.491036 8.08368 0H8.87608ZM8.15896 5.60359C4.5852 6.03685 4.74764 11.2221 8.13419 11.5528C12.5994 11.988 12.3637 5.09363 8.15896 5.60359Z" fill="#8A6B20"/>
                            </svg>
                            <span>アクセス情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" viewBox="0 0 16 25" fill="none">
                                <path d="M4.53637 0V2.53906C5.85057 2.43848 7.15487 2.69336 8.04948 3.70801C8.83424 2.63281 10.2108 2.46191 11.4636 2.53906V0H12.1554L12.1514 2.76562C13.7922 3.54102 14.1712 4.63184 13.2608 6.21582C12.1633 8.12402 11.2994 8.31445 11.6724 10.874C12.0752 13.6348 14.097 15.0566 15.1014 17.4492C15.7704 19.0439 15.9109 20.6768 16 22.3857C14.8827 23.6289 12.8867 23.0918 11.4814 23.4971C10.6937 23.7236 10.1049 24.3359 9.38743 24.6533C9.04107 24.8066 8.73231 24.8574 8.39584 24.9932C8.17318 24.9727 7.91786 25.0225 7.70312 24.9932C6.4384 24.8223 5.68135 23.8672 4.5908 23.5234C3.1618 23.0732 1.14993 23.6504 0 22.3867C0.091044 20.9316 0.169223 19.5635 0.631371 18.1641C1.52499 15.457 3.90203 13.7871 4.32657 10.876C4.71054 8.24121 3.72984 8.00488 2.6383 6.02344C1.78822 4.47852 2.40079 3.53027 3.84661 2.76855L3.84265 0.00292969H4.53538L4.53637 0Z" fill="#D42032"/>
                            </svg>
                            <span>女性求人</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
                                <path d="M0 18.4932L3.0752 5.05325C3.37598 2.34793 6.40625 1.77336 8.43848 0.76349L12.4033 10.9956L16.5078 0.772254C16.5967 0.707981 17.3896 1.0722 17.5469 1.14231C19.1475 1.85322 21.4277 2.69267 21.8271 4.56731L25 18.4942V18.7863C24.8779 19.2012 24.4766 19.2022 24.1045 19.3054C23.6553 19.43 21.9912 19.8459 21.6504 19.7426C21.5801 19.7212 21.5225 19.6793 21.4785 19.6209L18.9463 10.0228C18.9541 11.4825 18.2773 13.2277 18.3555 14.6524C18.4482 16.3254 19.3691 18.4192 19.5186 20.1137C19.5479 20.4467 19.6104 20.7389 19.3428 20.9853C18.7979 21.4878 14.2588 21.6523 13.2812 22.001C13.167 21.48 12.9639 20.9151 12.7676 20.4185C12.6836 20.2062 12.6133 19.8712 12.4033 19.7611L11.7178 22.001L5.83301 21.1011C5.45703 20.9239 5.44629 20.6775 5.46875 20.2987C5.57422 18.5322 6.66406 16.1862 6.64844 14.4508C6.64062 13.5773 6.27441 11.2332 6.05469 10.3626C6.02051 10.2273 6.05664 10.0588 5.86133 10.0218L3.4707 19.6647C3.41992 19.7319 3.34961 19.7475 3.27051 19.7621C2.99707 19.8118 0.68457 19.2986 0.364258 19.1525C0.226562 19.0902 0.133789 18.9529 0.000976562 18.8827L0 18.4932ZM12.8672 14.2823C13.167 13.9804 13.0039 13.3893 12.4521 13.4205C11.5 13.475 12.2354 14.9182 12.8672 14.2823ZM12.8672 16.862C12.2344 16.2261 11.5 17.6693 12.4521 17.7239C13.0039 17.755 13.168 17.1639 12.8672 16.862Z" fill="#363B8D"/>
                                <path d="M13.2812 2.61963L13.4736 6.94152L12.5479 9.43748C12.3311 9.4813 12.4258 9.34204 12.3779 9.22226C12.1953 8.76358 11.5508 7.31061 11.5264 6.94152C11.5107 6.7117 11.624 6.50427 11.625 6.27542C11.6299 5.0513 11.7168 3.8418 11.7178 2.61963H13.2812Z" fill="#363B8D"/>
                                <path d="M13.0762 0C13.1826 0.608649 13.4863 1.12965 13.1699 1.73051L11.8125 1.69838C11.4404 1.18321 11.75 0.631048 11.8623 0.0856978L13.0762 0Z" fill="#363B8D"/>
                            </svg>
                            <span>男性求人</span>
                        </a>
                    </div>
                </div>

                <div class="menu-bottom-buttons">
                    <a href="#" class="menu-bottom-btn">
                        <img src="{{ asset('assets/img/shops/shizuku/plo-group-btn.png') }}" alt="PLO Group">
                    </a>
                    <a href="#" class="menu-bottom-btn">
                        <img src="{{ asset('assets/img/shops/shizuku/recruit-btn.png') }}" alt="女の子募集中">
                    </a>
                </div>
                <div class="menu-bobile-image">
                    <img src="{{ asset('assets/img/shops/shizuku/credit_system.png') }}" alt="女の子募集中">
                </div>
            </div>
        </div>

        <div class="banner">
            <x-public.shops.contact-info phone-icon="assets/img/shops/shizuku/phone.png" phone-number="011-533-8988"
                email="@ShizukuHealth" address="〒064-0806</br> 北海道札幌市中央区南6条西5丁目" hours="9:00 ~ 0:00"
                credit-text="クレジット決済可能" note="電話予約の対応時間は朝8:30~となります。"
                phone-background="linear-gradient(180deg, rgba(255, 242, 215, 0.8) 20.67%, rgba(189, 144, 47, 0.8) 100%)"
                address-background="#160B00" />
            <div class="register">
                <x-public.shops.register-button text="新規会員登録はコチラ！" background-color="#FFF5FB" text-color="#FF3498" />
            </div>
        </div>
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb-navigation">
            <p>すすきのhigh grade health ＞ トップページ</p>
        </div>
        <div class="home-content">
            <x-public.shops.home-header logo-image="assets/img/shops/shizuku/footer-logo.png" logo-alt="Shizuku Logo"
                :menu-items="[
                    ['title' => 'トップページ', 'subtitle' => 'top page'],
                    ['title' => 'キャスト一覧', 'subtitle' => 'cast list'],
                    ['title' => '出勤情報', 'subtitle' => 'schedule'],
                    ['title' => '写メ日記', 'subtitle' => 'photo diary'],
                    ['title' => 'イベント一覧', 'subtitle' => 'event'],
                    ['title' => '料金システム', 'subtitle' => 'system'],
                    ['title' => '新人情報', 'subtitle' => 'new cast'],
                    ['title' => 'ログイン', 'subtitle' => 'login'],
                ]" menu-button-id="mobileMenuButton" background-color="#160B00" />
            <div class="home-schedule">
                <x-public.shops.section-title text="schedule" background-color="#2A1A08" gradient-start="#FFF2D7"
                    gradient-end="#BD902F" letter-spacing="6px" />
                <x-public.shops.schedule-info icon-image="assets/img/shop/calender-g.png" icon-alt="出勤情報"
                    title="出勤情報" description="本日出勤するキャスト一覧になります。" button-text="一覧を見る" background-color="#FFFFFF"
                    border-color="#2A1A08" text-color="#2A1A08" underline-gradient-start="#FFF2D7"
                    underline-gradient-end="#BD902F" responsive-variant="new-girl" />
                <div class="home-schedule-cards">
                    @for ($i = 0; $i < 12; $i++)
                        <x-public.shops.schedule-card background-image="assets/img/shops/shizuku/coming-soon-card.png"
                            frame-image="assets/img/shops/shizuku/card-frame.png" badge-shift="本日出勤"
                            badge-time="12:00〜24:00"
                            status-icon='<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/></svg>'
                            status-text="待機中" name="のんたん（20）" measurements="T.160 B.85(C) W.60 H.83"
                            message="キャストメッセージが出ます" />
                    @endfor
                </div>
                <div class="home-schedule-button-mobile">
                    <div class="schedule-info-button schedule-info-button-mobile"
                        style="background: #FFFFFF; border-left-color: #2A1A08;">
                        <p style="color: #2A1A08;">一覧を見る</p>
                        <div class="schedule-info-underline"
                            style="background: linear-gradient(180deg, #FFF2D7 20.67%, #BD902F 100%);"></div>
                    </div>
                </div>
            </div>
            <div class="home-news">
                <x-public.shops.news-section title="news" slider-id="newsSlider"
                    default-image="assets/img/shops/shizuku/news-image.png" variant="news" />
                <x-public.shops.news-section title="photo diary" slider-id="diarySlider"
                    default-image="assets/img/shops/shizuku/diary-image.png" variant="diary" />
            </div>
            <x-public.shops.pickup-section header-background-image="assets/img/shops/shizuku/pickup-bg.png"
                title-en="PICK UP" title-ja="ピックアップ" description="当店の女の子イチオシ情報です" badge-text="当店一押し"
                :cast-images="[
                    ['image' => 'assets/img/shops/shizuku/pickup-cast-1.png', 'alt' => 'Cast 1'],
                    ['image' => 'assets/img/shops/shizuku/pickup-cast-2.png', 'alt' => 'Cast 2'],
                ]" frame-image="assets/img/shops/shizuku/card-frame-2.png" />
            <div class="home-new-girl-section">
                <x-public.shops.section-title text="NEW GIRL" background-color="#2A1A08" gradient-start="#FFF2D7"
                    gradient-end="#BD902F" letter-spacing="0.375rem" opacity="0.7" small="true" />
                @php
                    $newGirlIconSvg =
                        '<svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="35" height="35" fill="url(#pattern0_8_1967)"/><defs><pattern id="pattern0_8_1967" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_8_1967" transform="scale(0.00390625)"/></pattern><image id="image0_8_1967" width="256" height="256" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/></svg>';
                @endphp
                <x-public.shops.schedule-info :icon-svg="$newGirlIconSvg" title="新人情報"
                    description="新入デビュー♪ ヴィラコート雫の新人入店情報になります" button-text="一覧を見る" background-color="#FFFFFF"
                    border-color="#2A1A08" text-color="#2A1A08" underline-gradient-start="#FFF2D7"
                    underline-gradient-end="#BD902F" responsive-variant="new-girl" />
            </div>
            <div class="home-new-girl-slider">
                <div class="new-girl-slider-cards">
                    <div class="new-girl-slider-content">
                        @for ($i = 0; $i < 6; $i++)
                            <x-public.shops.new-girl-card background-image="assets/img/shops/shizuku/new-girl.png"
                                photo-image="assets/img/shops/shizuku/new-girl.png" date="2025.00.00 SUN"
                                date-label="入店" name="名前名前" name-vertical="Name" age="00"
                                measurements="T.000 B.000(C) W.00 H.00"
                                description="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト"
                                gradient-id="calendar-gradient-{{ $i }}" gradient-start="#FFF2D7"
                                gradient-end="#BD902F" overlay-opacity="0.7" name-color="#FFFFFF"
                                measurements-color="#FFFFFF" />
                        @endfor
                    </div>
                </div>
                <div class="new-girl-slider-controls">
                    <div class="slider-dots">
                        <button class="dot active" aria-label="Go to page 1"></button>
                        <button class="dot" aria-label="Go to page 2"></button>
                        <button class="dot" aria-label="Go to page 3"></button>
                    </div>
                    <div class="slider-buttons">
                        <button class="new-girl-slider-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61"
                                viewBox="0 0 61 61" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M60.5 30.5C60.5 31.4283 60.1313 32.3185 59.4749 32.9749C58.8185 33.6313 57.9283 34 57 34H11.5L23.75 46.25C24.0948 46.5948 24.3688 47.0038 24.556 47.4542C24.7432 47.9046 24.8401 48.3879 24.8413 48.8762C24.8426 49.3645 24.7482 49.8483 24.5634 50.2996C24.3786 50.7509 24.1069 51.1613 23.7638 51.5081C23.4207 51.855 23.0129 52.1311 22.5631 52.3203C22.1133 52.5095 21.6304 52.6084 21.1421 52.6118C20.6538 52.6151 20.1696 52.5228 19.7171 52.3398C19.2646 52.1568 18.8527 51.8867 18.5042 51.5458L0.979167 34.0208C0.32282 33.3645 -0.0457764 32.4748 -0.0457764 31.5466C-0.0457764 30.6185 0.32282 29.7288 0.979167 29.0725L18.5042 11.5475C19.1708 10.9236 20.0465 10.5793 20.9543 10.5859C21.8621 10.5925 22.7326 10.9496 23.3901 11.5828C24.0476 12.216 24.4417 13.0759 24.4919 13.9828C24.5421 14.8898 24.2444 15.7866 23.6625 16.4875L11.5 28.5H57C57.9283 28.5 58.8185 28.8687 59.4749 29.5251C60.1313 30.1815 60.5 31.0717 60.5 32V30.5Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <button class="new-girl-slider-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61"
                                viewBox="0 0 61 61" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.5 30.5C0.5 31.4283 0.868749 32.3185 1.52513 32.9749C2.1815 33.6313 3.07174 34 4 34H49.5L37.25 46.25C36.9052 46.5948 36.6312 47.0038 36.444 47.4542C36.2568 47.9046 36.1599 48.3879 36.1587 48.8762C36.1574 49.3645 36.2518 49.8483 36.4366 50.2996C36.6214 50.7509 36.8931 51.1613 37.2362 51.5081C37.5793 51.855 37.9871 52.1311 38.4369 52.3203C38.8867 52.5095 39.3696 52.6084 39.8579 52.6118C40.3462 52.6151 40.8304 52.5228 41.2829 52.3398C41.7354 52.1568 42.1473 51.8867 42.4958 51.5458L60.0208 34.0208C60.6772 33.3645 61.0458 32.4748 61.0458 31.5466C61.0458 30.6185 60.6772 29.7288 60.0208 29.0725L42.4958 11.5475C41.8292 10.9236 40.9535 10.5793 40.0457 10.5859C39.1379 10.5925 38.2674 10.9496 37.6099 11.5828C36.9524 12.216 36.5583 13.0759 36.5081 13.9828C36.4579 14.8898 36.7556 15.7866 37.3375 16.4875L49.5 28.5H4C3.07174 28.5 2.1815 28.8687 1.52513 29.5251C0.868749 30.1815 0.5 31.0717 0.5 32V30.5Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="new-girl-slider-mobile-controls">
                    <button class="new-girl-slider-mobile-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M60.5 30.5C60.5 31.4283 60.1313 32.3185 59.4749 32.9749C58.8185 33.6313 57.9283 34 57 34H11.5L23.75 46.25C24.0948 46.5948 24.3688 47.0038 24.556 47.4542C24.7432 47.9046 24.8401 48.3879 24.8413 48.8762C24.8426 49.3645 24.7482 49.8483 24.5634 50.2996C24.3786 50.7509 24.1069 51.1613 23.7638 51.5081C23.4207 51.855 23.0129 52.1311 22.5631 52.3203C22.1133 52.5095 21.6304 52.6084 21.1421 52.6118C20.6538 52.6151 20.1696 52.5228 19.7171 52.3398C19.2646 52.1568 18.8527 51.8867 18.5042 51.5458L0.979167 34.0208C0.32282 33.3645 -0.0457764 32.4748 -0.0457764 31.5466C-0.0457764 30.6185 0.32282 29.7288 0.979167 29.0725L18.5042 11.5475C19.1708 10.9236 20.0465 10.5793 20.9543 10.5859C21.8621 10.5925 22.7326 10.9496 23.3901 11.5828C24.0476 12.216 24.4417 13.0759 24.4919 13.9828C24.5421 14.8898 24.2444 15.7866 23.6625 16.4875L11.5 28.5H57C57.9283 28.5 58.8185 28.8687 59.4749 29.5251C60.1313 30.1815 60.5 31.0717 60.5 32V30.5Z"
                                fill="white" />
                        </svg>
                    </button>
                    <button class="new-girl-slider-mobile-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.5 30.5C0.5 31.4283 0.868749 32.3185 1.52513 32.9749C2.1815 33.6313 3.07174 34 4 34H49.5L37.25 46.25C36.9052 46.5948 36.6312 47.0038 36.444 47.4542C36.2568 47.9046 36.1599 48.3879 36.1587 48.8762C36.1574 49.3645 36.2518 49.8483 36.4366 50.2996C36.6214 50.7509 36.8931 51.1613 37.2362 51.5081C37.5793 51.855 37.9871 52.1311 38.4369 52.3203C38.8867 52.5095 39.3696 52.6084 39.8579 52.6118C40.3462 52.6151 40.8304 52.5228 41.2829 52.3398C41.7354 52.1568 42.1473 51.8867 42.4958 51.5458L60.0208 34.0208C60.6772 33.3645 61.0458 32.4748 61.0458 31.5466C61.0458 30.6185 60.6772 29.7288 60.0208 29.0725L42.4958 11.5475C41.8292 10.9236 40.9535 10.5793 40.0457 10.5859C39.1379 10.5925 38.2674 10.9496 37.6099 11.5828C36.9524 12.216 36.5583 13.0759 36.5081 13.9828C36.4579 14.8898 36.7556 15.7866 37.3375 16.4875L49.5 28.5H4C3.07174 28.5 2.1815 28.8687 1.52513 29.5251C0.868749 30.1815 0.5 31.0717 0.5 32V30.5Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            @php
                $newGirlButtonHref = null; // Add href if needed
                $newGirlButtonOnClick = null; // Add onClick if needed
            @endphp
            <div class="home-new-girl-button-mobile">
                @if ($newGirlButtonHref)
                    <a href="{{ $newGirlButtonHref }}" class="schedule-info-button schedule-info-button-mobile"
                        style="background: #FFFFFF; border-left-color: #2A1A08;">
                        <p style="color: #2A1A08;">一覧を見る</p>
                        <div class="schedule-info-underline"
                            style="background: linear-gradient(180deg, #FFF2D7 20.67%, #BD902F 100%);"></div>
                    </a>
                @else
                    <div class="schedule-info-button schedule-info-button-mobile"
                        style="background: #FFFFFF; border-left-color: #2A1A08;"
                        @if ($newGirlButtonOnClick) onclick="{{ $newGirlButtonOnClick }}" @endif>
                        <p style="color: #2A1A08;">一覧を見る</p>
                        <div class="schedule-info-underline"
                            style="background: linear-gradient(180deg, #FFF2D7 20.67%, #BD902F 100%);"></div>
                    </div>
                @endif
            </div>
            <div class="home-castlist">
                <x-public.shops.section-title text="cast list" background-color="#2A1A08" gradient-start="#FFF2D7"
                    gradient-end="#BD902F" letter-spacing="0.375rem" opacity="0.7" />
                <div class="home-castlist-info">
                    <div class="castlist-info-header">
                        <img src="{{ asset('assets/img/shops/shizuku/girl-icon.png') }}" alt="出勤情報"
                            class="castlist-info-icon">
                        <p class="castlist-info-title">キャスト一覧</p>
                    </div>
                    <div class="castlist-info-description">
                        <p>ヴィラコート雫のキャスト一覧です。</p>
                    </div>
                    <div class="castlist-info-button">
                        <p>一覧を見る</p>
                        <div class="castlist-info-underline"></div>
                    </div>
                </div>
                <div class="castlist-slider-wrapper">
                    <button class="castlist-slider-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="19" viewBox="0 0 26 19"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.53674e-06 9.01713C9.53674e-06 9.39623 0.150606 9.7598 0.418667 10.0279C0.686729 10.2959 1.0503 10.4465 1.4294 10.4465H20.85L15.6661 15.6304C15.5257 15.7613 15.413 15.9191 15.3349 16.0944C15.2568 16.2698 15.2148 16.459 15.2114 16.651C15.208 16.8429 15.2433 17.0335 15.3152 17.2115C15.3871 17.3895 15.4941 17.5512 15.6298 17.6869C15.7655 17.8226 15.9272 17.9296 16.1052 18.0015C16.2832 18.0734 16.4738 18.1087 16.6658 18.1053C16.8577 18.102 17.047 18.06 17.2223 17.9818C17.3976 17.9037 17.5554 17.7911 17.6863 17.6506L25.3097 10.0272C25.5774 9.75922 25.7277 9.39592 25.7277 9.01713C25.7277 8.63834 25.5774 8.27504 25.3097 8.00703L17.6863 0.383632C17.4153 0.131145 17.0569 -0.00631097 16.6866 0.000222693C16.3163 0.00675636 15.963 0.15677 15.7011 0.418658C15.4392 0.680547 15.2892 1.03386 15.2827 1.40417C15.2762 1.77448 15.4136 2.13287 15.6661 2.40383L20.85 7.58774H1.4294C1.0503 7.58774 0.686729 7.73834 0.418667 8.0064C0.150606 8.27446 9.53674e-06 8.63803 9.53674e-06 9.01713Z"
                                fill="white" />
                        </svg>
                    </button>
                    <div class="home-castlist-cards">
                        @for ($i = 0; $i < 12; $i++)
                            <x-public.shops.schedule-card background-image="assets/img/shops/shizuku/castlist.png"
                                frame-image="assets/img/shops/shizuku/card-frame.png" badge-shift="本日出勤"
                                badge-time="12:00〜24:00" status-icon="" status-text="" name="かれん (20)"
                                measurements="T.160 B.85(C) W.60 H.83" message="キャストメッセージが出ます"
                                badge-border-color="#B90000" badge-bg-color="#B90000" badge-text-color="#FFDA89"
                                badge-time-color="#2A1A08" status-text-color="#FFE500" name-color="#FFFFFF"
                                measurements-color="#FFFFFF" message-gradient-start="#FFF2D7"
                                message-gradient-end="#BD902F" content-gradient-start="rgba(42, 26, 8, 0.80)"
                                content-gradient-end="rgba(0, 0, 0, 0.00)" variant="castlist" />
                        @endfor
                    </div>
                    <button class="castlist-slider-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="19" viewBox="0 0 26 19"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.53674e-06 9.01713C9.53674e-06 9.39623 0.150606 9.7598 0.418667 10.0279C0.686729 10.2959 1.0503 10.4465 1.4294 10.4465H20.85L15.6661 15.6304C15.5257 15.7613 15.413 15.9191 15.3349 16.0944C15.2568 16.2698 15.2148 16.459 15.2114 16.651C15.208 16.8429 15.2433 17.0335 15.3152 17.2115C15.3871 17.3895 15.4941 17.5512 15.6298 17.6869C15.7655 17.8226 15.9272 17.9296 16.1052 18.0015C16.2832 18.0734 16.4738 18.1087 16.6658 18.1053C16.8577 18.102 17.047 18.06 17.2223 17.9818C17.3976 17.9037 17.5554 17.7911 17.6863 17.6506L25.3097 10.0272C25.5774 9.75922 25.7277 9.39592 25.7277 9.01713C25.7277 8.63834 25.5774 8.27504 25.3097 8.00703L17.6863 0.383632C17.4153 0.131145 17.0569 -0.00631097 16.6866 0.000222693C16.3163 0.00675636 15.963 0.15677 15.7011 0.418658C15.4392 0.680547 15.2892 1.03386 15.2827 1.40417C15.2762 1.77448 15.4136 2.13287 15.6661 2.40383L20.85 7.58774H1.4294C1.0503 7.58774 0.686729 7.73834 0.418667 8.0064C0.150606 8.27446 9.53674e-06 8.63803 9.53674e-06 9.01713Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="home-ranking">
                <div class="ranking-cast-card">
                    <div class="ranking-cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/castlist.png') }}" alt="Cast 1"
                            class="cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="Frame"
                            class="cast-frame">
                        <div class="ranking-badge ranking-no1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="240" height="154"
                                viewBox="0 0 240 154" fill="none">
                                <path d="M0 0H240V154H0V0Z" fill="url(#paint0_linear_no1)" fill-opacity="0.7" />
                                <path
                                    d="M127.408 45.6182C126.506 45.1777 125.813 44.5654 125.33 43.7812C124.846 42.9863 124.604 42.1108 124.604 41.1548C124.604 39.6938 125.152 38.437 126.248 37.3843C127.354 36.3315 128.767 35.8052 130.486 35.8052C131.893 35.8052 133.112 36.1489 134.144 36.8364H137.27C137.731 36.8364 138 36.8525 138.075 36.8848C138.15 36.9062 138.204 36.9492 138.236 37.0137C138.301 37.1104 138.333 37.2822 138.333 37.5293C138.333 37.8086 138.306 38.002 138.252 38.1094C138.22 38.1631 138.161 38.2061 138.075 38.2383C138 38.2705 137.731 38.2866 137.27 38.2866H135.352C135.954 39.0601 136.254 40.0483 136.254 41.2515C136.254 42.6265 135.728 43.8027 134.675 44.7803C133.623 45.7578 132.21 46.2466 130.438 46.2466C129.707 46.2466 128.96 46.1392 128.198 45.9243C127.725 46.3325 127.403 46.6924 127.231 47.0039C127.07 47.3047 126.989 47.5625 126.989 47.7773C126.989 47.96 127.075 48.1372 127.247 48.3091C127.43 48.481 127.779 48.6045 128.294 48.6797C128.595 48.7227 129.347 48.7603 130.55 48.7925C132.763 48.8462 134.197 48.9214 134.853 49.0181C135.852 49.1577 136.646 49.5283 137.237 50.1299C137.839 50.7314 138.14 51.4727 138.14 52.3535C138.14 53.5674 137.57 54.7061 136.432 55.7695C134.756 57.3379 132.57 58.1221 129.874 58.1221C127.8 58.1221 126.049 57.6548 124.621 56.7202C123.815 56.1831 123.412 55.6245 123.412 55.0444C123.412 54.7866 123.471 54.5288 123.589 54.271C123.772 53.8735 124.148 53.3203 124.717 52.6113C124.792 52.5146 125.34 51.9346 126.361 50.8711C125.802 50.5381 125.405 50.2427 125.168 49.9849C124.943 49.7163 124.83 49.4155 124.83 49.0825C124.83 48.7065 124.98 48.2661 125.281 47.7612C125.593 47.2563 126.302 46.542 127.408 45.6182ZM130.212 36.5786C129.417 36.5786 128.751 36.8955 128.214 37.5293C127.677 38.1631 127.408 39.1353 127.408 40.4458C127.408 42.1431 127.773 43.459 128.504 44.3936C129.062 45.1025 129.771 45.457 130.631 45.457C131.447 45.457 132.119 45.1509 132.645 44.5386C133.171 43.9263 133.435 42.9648 133.435 41.6543C133.435 39.9463 133.064 38.6089 132.323 37.6421C131.775 36.9331 131.071 36.5786 130.212 36.5786ZM127.247 51C126.742 51.5479 126.361 52.0581 126.103 52.5308C125.845 53.0034 125.716 53.4385 125.716 53.8359C125.716 54.3516 126.028 54.8027 126.651 55.1895C127.725 55.8555 129.277 56.1885 131.308 56.1885C133.241 56.1885 134.665 55.8447 135.578 55.1572C136.501 54.4805 136.963 53.7554 136.963 52.9819C136.963 52.4233 136.689 52.0259 136.142 51.7896C135.583 51.5532 134.477 51.4136 132.822 51.3706C130.405 51.3062 128.547 51.1826 127.247 51Z"
                                    fill="white" />
                                <path
                                    d="M111.263 38.9312C112.992 36.8472 114.641 35.8052 116.209 35.8052C117.015 35.8052 117.708 36.0093 118.288 36.4175C118.868 36.8149 119.33 37.4756 119.674 38.3994C119.91 39.0439 120.028 40.0322 120.028 41.3643V47.6646C120.028 48.5991 120.104 49.2329 120.254 49.5659C120.372 49.8345 120.56 50.0439 120.818 50.1943C121.086 50.3447 121.575 50.4199 122.284 50.4199V51H114.985V50.4199H115.291C115.979 50.4199 116.457 50.3179 116.725 50.1138C117.004 49.8989 117.198 49.5874 117.305 49.1792C117.348 49.0181 117.37 48.5132 117.37 47.6646V41.6221C117.37 40.2793 117.192 39.3071 116.838 38.7056C116.494 38.0933 115.909 37.7871 115.082 37.7871C113.803 37.7871 112.53 38.4854 111.263 39.8818V47.6646C111.263 48.6636 111.322 49.2812 111.44 49.5176C111.59 49.8291 111.794 50.0601 112.052 50.2104C112.321 50.3501 112.858 50.4199 113.664 50.4199V51H106.364V50.4199H106.687C107.438 50.4199 107.943 50.2319 108.201 49.856C108.47 49.4692 108.604 48.7388 108.604 47.6646V42.186C108.604 40.4136 108.561 39.334 108.475 38.9473C108.4 38.5605 108.276 38.2974 108.104 38.1577C107.943 38.0181 107.723 37.9482 107.444 37.9482C107.143 37.9482 106.783 38.0288 106.364 38.1899L106.123 37.6099L110.57 35.8052H111.263V38.9312Z"
                                    fill="white" />
                                <path
                                    d="M101.53 28.0869C101.981 28.0869 102.363 28.248 102.674 28.5703C102.997 28.8818 103.158 29.2632 103.158 29.7144C103.158 30.1655 102.997 30.5522 102.674 30.8745C102.363 31.1968 101.981 31.3579 101.53 31.3579C101.079 31.3579 100.692 31.1968 100.37 30.8745C100.048 30.5522 99.8867 30.1655 99.8867 29.7144C99.8867 29.2632 100.042 28.8818 100.354 28.5703C100.676 28.248 101.068 28.0869 101.53 28.0869ZM102.868 35.8052V47.6646C102.868 48.5884 102.932 49.2061 103.061 49.5176C103.201 49.8184 103.399 50.0439 103.657 50.1943C103.926 50.3447 104.409 50.4199 105.107 50.4199V51H97.937V50.4199C98.6567 50.4199 99.1401 50.3501 99.3872 50.2104C99.6343 50.0708 99.8276 49.8398 99.9673 49.5176C100.118 49.1953 100.193 48.5776 100.193 47.6646V41.9766C100.193 40.376 100.145 39.3394 100.048 38.8667C99.9727 38.5229 99.8545 38.2866 99.6934 38.1577C99.5322 38.0181 99.312 37.9482 99.0327 37.9482C98.7319 37.9482 98.3667 38.0288 97.937 38.1899L97.7114 37.6099L102.159 35.8052H102.868Z"
                                    fill="white" />
                                <path
                                    d="M85.6426 28.0869V42.7822L89.397 39.3501C90.1919 38.6196 90.6538 38.1577 90.7827 37.9644C90.8687 37.8354 90.9116 37.7065 90.9116 37.5776C90.9116 37.3628 90.8203 37.1802 90.6377 37.0298C90.4658 36.8687 90.1758 36.7773 89.7676 36.7559V36.2402H96.1807V36.7559C95.2998 36.7773 94.564 36.9116 93.9731 37.1587C93.3931 37.4058 92.7539 37.8462 92.0557 38.48L88.269 41.9766L92.0557 46.7622C93.1084 48.0835 93.8174 48.9214 94.1826 49.2759C94.6982 49.7808 95.1494 50.1084 95.5361 50.2588C95.8047 50.3662 96.272 50.4199 96.938 50.4199V51H89.7676V50.4199C90.1758 50.4092 90.4497 50.3501 90.5894 50.2427C90.7397 50.1245 90.8149 49.9634 90.8149 49.7593C90.8149 49.5122 90.6001 49.1147 90.1704 48.5669L85.6426 42.7822V47.6807C85.6426 48.6367 85.707 49.2651 85.8359 49.5659C85.9756 49.8667 86.1689 50.0815 86.416 50.2104C86.6631 50.3394 87.2002 50.4092 88.0273 50.4199V51H80.5186V50.4199C81.2705 50.4199 81.8345 50.3286 82.2104 50.146C82.436 50.0278 82.6079 49.8452 82.7261 49.5981C82.8872 49.2437 82.9678 48.6313 82.9678 47.7612V34.3228C82.9678 32.6147 82.9302 31.5728 82.855 31.1968C82.7798 30.8101 82.6562 30.5469 82.4844 30.4072C82.3125 30.2568 82.0869 30.1816 81.8076 30.1816C81.582 30.1816 81.2437 30.2729 80.7925 30.4556L80.5186 29.8916L84.9014 28.0869H85.6426Z"
                                    fill="white" />
                                <path
                                    d="M69.0781 38.9312C70.8076 36.8472 72.4565 35.8052 74.0249 35.8052C74.8306 35.8052 75.5234 36.0093 76.1035 36.4175C76.6836 36.8149 77.1455 37.4756 77.4893 38.3994C77.7256 39.0439 77.8438 40.0322 77.8438 41.3643V47.6646C77.8438 48.5991 77.9189 49.2329 78.0693 49.5659C78.1875 49.8345 78.3755 50.0439 78.6333 50.1943C78.9019 50.3447 79.3906 50.4199 80.0996 50.4199V51H72.8003V50.4199H73.1064C73.7939 50.4199 74.272 50.3179 74.5405 50.1138C74.8198 49.8989 75.0132 49.5874 75.1206 49.1792C75.1636 49.0181 75.1851 48.5132 75.1851 47.6646V41.6221C75.1851 40.2793 75.0078 39.3071 74.6533 38.7056C74.3096 38.0933 73.7241 37.7871 72.897 37.7871C71.6187 37.7871 70.3457 38.4854 69.0781 39.8818V47.6646C69.0781 48.6636 69.1372 49.2812 69.2554 49.5176C69.4058 49.8291 69.6099 50.0601 69.8677 50.2104C70.1362 50.3501 70.6733 50.4199 71.479 50.4199V51H64.1797V50.4199H64.502C65.2539 50.4199 65.7588 50.2319 66.0166 49.856C66.2852 49.4692 66.4194 48.7388 66.4194 47.6646V42.186C66.4194 40.4136 66.3765 39.334 66.2905 38.9473C66.2153 38.5605 66.0918 38.2974 65.9199 38.1577C65.7588 38.0181 65.5386 37.9482 65.2593 37.9482C64.9585 37.9482 64.5986 38.0288 64.1797 38.1899L63.938 37.6099L68.3853 35.8052H69.0781V38.9312Z"
                                    fill="white" />
                                <path
                                    d="M58.4756 48.873C56.9609 50.0439 56.0103 50.7207 55.6235 50.9033C55.0435 51.1719 54.4258 51.3062 53.7705 51.3062C52.75 51.3062 51.9067 50.957 51.2407 50.2588C50.5854 49.5605 50.2578 48.6421 50.2578 47.5034C50.2578 46.7837 50.4189 46.1606 50.7412 45.6343C51.1816 44.9038 51.9443 44.2163 53.0293 43.5718C54.125 42.9272 55.9404 42.1431 58.4756 41.2192V40.6392C58.4756 39.1675 58.2393 38.1577 57.7666 37.6099C57.3047 37.062 56.6279 36.7881 55.7363 36.7881C55.0596 36.7881 54.5225 36.9707 54.125 37.3359C53.7168 37.7012 53.5127 38.1201 53.5127 38.5928L53.5449 39.5273C53.5449 40.0215 53.416 40.4028 53.1582 40.6714C52.9111 40.9399 52.5835 41.0742 52.1753 41.0742C51.7778 41.0742 51.4502 40.9346 51.1924 40.6553C50.9453 40.376 50.8218 39.9946 50.8218 39.5112C50.8218 38.5874 51.2944 37.7388 52.2397 36.9653C53.1851 36.1919 54.5117 35.8052 56.2197 35.8052C57.5303 35.8052 58.6045 36.0254 59.4424 36.4658C60.0762 36.7988 60.5435 37.3198 60.8442 38.0288C61.0376 38.4907 61.1343 39.436 61.1343 40.8647V45.876C61.1343 47.2832 61.1611 48.1479 61.2148 48.4702C61.2686 48.7817 61.3545 48.9912 61.4727 49.0986C61.6016 49.2061 61.7466 49.2598 61.9077 49.2598C62.0796 49.2598 62.23 49.2222 62.3589 49.147C62.5845 49.0073 63.0195 48.6152 63.6641 47.9707V48.873C62.4609 50.4844 61.3115 51.29 60.2158 51.29C59.6895 51.29 59.2705 51.1074 58.959 50.7422C58.6475 50.377 58.4863 49.7539 58.4756 48.873ZM58.4756 47.8257V42.2021C56.8535 42.8467 55.8062 43.3032 55.3335 43.5718C54.4849 44.0444 53.8779 44.5386 53.5127 45.0542C53.1475 45.5698 52.9648 46.1338 52.9648 46.7461C52.9648 47.5195 53.1958 48.1641 53.6577 48.6797C54.1196 49.1846 54.6514 49.437 55.2529 49.437C56.0693 49.437 57.1436 48.8999 58.4756 47.8257Z"
                                    fill="white" />
                                <path
                                    d="M49.3716 51H43.5386L36.1426 40.7842C35.5947 40.8057 35.1489 40.8164 34.8052 40.8164C34.6655 40.8164 34.5151 40.8164 34.354 40.8164C34.1929 40.8057 34.0264 40.7949 33.8545 40.7842V47.1328C33.8545 48.5078 34.0049 49.3618 34.3057 49.6948C34.7139 50.1675 35.3262 50.4038 36.1426 50.4038H36.9966V51H27.6348V50.4038H28.4565C29.3804 50.4038 30.041 50.103 30.4385 49.5015C30.6641 49.1685 30.7769 48.3789 30.7769 47.1328V33.0176C30.7769 31.6426 30.6265 30.7886 30.3257 30.4556C29.9067 29.9829 29.2837 29.7466 28.4565 29.7466H27.6348V29.1504H35.5947C37.915 29.1504 39.623 29.3223 40.7188 29.666C41.8252 29.999 42.7598 30.6221 43.5225 31.5352C44.2959 32.4375 44.6826 33.5171 44.6826 34.7739C44.6826 36.1167 44.2422 37.2822 43.3613 38.2705C42.4912 39.2588 41.1377 39.957 39.3008 40.3652L43.8125 46.6333C44.8438 48.0728 45.73 49.0288 46.4712 49.5015C47.2124 49.9741 48.1792 50.2749 49.3716 50.4038V51ZM33.8545 39.769C34.0586 39.769 34.2358 39.7744 34.3862 39.7852C34.5366 39.7852 34.6602 39.7852 34.7568 39.7852C36.8408 39.7852 38.4092 39.334 39.4619 38.4316C40.5254 37.5293 41.0571 36.3799 41.0571 34.9834C41.0571 33.6191 40.6274 32.5127 39.7681 31.6641C38.9194 30.8047 37.7915 30.375 36.3843 30.375C35.7612 30.375 34.918 30.4771 33.8545 30.6812V39.769Z"
                                    fill="white" />
                                <path
                                    d="M141.074 120.854C142.39 120.854 143.496 121.315 144.392 122.239C145.287 123.135 145.735 124.227 145.735 125.515C145.735 126.802 145.273 127.908 144.35 128.832C143.454 129.728 142.362 130.176 141.074 130.176C139.786 130.176 138.681 129.728 137.757 128.832C136.861 127.908 136.413 126.802 136.413 125.515C136.413 124.199 136.861 123.093 137.757 122.197C138.681 121.301 139.786 120.854 141.074 120.854Z"
                                    fill="white" />
                                <path
                                    d="M108.824 89.4014C114.647 89.4014 119.322 91.613 122.85 96.0361C125.845 99.8154 127.343 104.155 127.343 109.054C127.343 112.497 126.517 115.982 124.865 119.51C123.214 123.037 120.932 125.697 118.021 127.488C115.137 129.28 111.918 130.176 108.362 130.176C102.567 130.176 97.9622 127.866 94.5469 123.247C91.6634 119.356 90.2217 114.989 90.2217 110.146C90.2217 106.618 91.0895 103.119 92.8252 99.6475C94.5889 96.1481 96.8984 93.5726 99.7539 91.9209C102.609 90.2412 105.633 89.4014 108.824 89.4014ZM107.522 92.1309C106.039 92.1309 104.541 92.5788 103.029 93.4746C101.546 94.3424 100.342 95.8822 99.418 98.0938C98.4941 100.305 98.0322 103.147 98.0322 106.618C98.0322 112.217 99.138 117.046 101.35 121.105C103.589 125.165 106.529 127.194 110.168 127.194C112.883 127.194 115.123 126.075 116.887 123.835C118.65 121.595 119.532 117.746 119.532 112.287C119.532 105.456 118.062 100.081 115.123 96.1621C113.135 93.4746 110.602 92.1309 107.522 92.1309Z"
                                    fill="white" />
                                <path
                                    d="M24.042 72.0586H39.4951L74.3066 114.765V81.9268C74.3066 78.4274 73.9147 76.2438 73.1309 75.376C72.0951 74.2002 70.4574 73.6123 68.2178 73.6123H66.2441V72.0586H86.0645V73.6123H84.0488C81.6413 73.6123 79.9336 74.3402 78.9258 75.7959C78.3099 76.6917 78.002 78.7354 78.002 81.9268V129.924H76.4902L38.9492 84.0684V119.132C38.9492 122.631 39.3271 124.815 40.083 125.683C41.1468 126.858 42.7845 127.446 44.9961 127.446H47.0117V129H27.1914V127.446H29.165C31.6006 127.446 33.3223 126.718 34.3301 125.263C34.946 124.367 35.2539 122.323 35.2539 119.132V79.5332C33.6022 77.6016 32.3424 76.3278 31.4746 75.7119C30.6348 75.096 29.389 74.5221 27.7373 73.9902C26.9255 73.7383 25.6937 73.6123 24.042 73.6123V72.0586Z"
                                    fill="white" />
                                <path
                                    d="M167.711 40.022L191.72 28.3086H194.121V111.612C194.121 117.141 194.339 120.585 194.775 121.943C195.26 123.301 196.23 124.344 197.686 125.071C199.141 125.799 202.099 126.211 206.562 126.308V129H169.457V126.308C174.113 126.211 177.12 125.823 178.479 125.144C179.837 124.417 180.782 123.471 181.316 122.307C181.849 121.094 182.116 117.529 182.116 111.612V58.356C182.116 51.1776 181.874 46.5698 181.389 44.5327C181.049 42.9806 180.419 41.8408 179.497 41.1133C178.624 40.3857 177.557 40.022 176.296 40.022C174.501 40.022 172.003 40.7738 168.802 42.2773L167.711 40.022Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_no1" x1="12.5" y1="154"
                                        x2="240" y2="-1.12639e-05" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.524038" stop-color="#AA7E2B" />
                                        <stop offset="1" stop-color="#D3CCA8" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="ranking-cast-card">
                    <div class="ranking-cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/castlist.png') }}" alt="Cast 2"
                            class="cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="Frame"
                            class="cast-frame">
                        <div class="ranking-badge ranking-no2">
                            <svg width="220" height="137" viewBox="0 0 220 137" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H220V137H0V0Z" fill="url(#paint0_linear_8_59)" fill-opacity="0.7" />
                                <path
                                    d="M102.951 39.249C102.322 38.9421 101.839 38.5153 101.502 37.9688C101.166 37.4147 100.997 36.8045 100.997 36.1382C100.997 35.12 101.379 34.244 102.143 33.5103C102.914 32.7765 103.898 32.4097 105.096 32.4097C106.077 32.4097 106.927 32.6493 107.646 33.1284H109.824C110.146 33.1284 110.333 33.1396 110.386 33.1621C110.438 33.1771 110.476 33.207 110.498 33.252C110.543 33.3193 110.565 33.4391 110.565 33.6113C110.565 33.806 110.547 33.9408 110.509 34.0156C110.487 34.0531 110.446 34.083 110.386 34.1055C110.333 34.1279 110.146 34.1392 109.824 34.1392H108.488C108.907 34.6782 109.117 35.367 109.117 36.2056C109.117 37.1639 108.75 37.9837 108.016 38.665C107.282 39.3464 106.298 39.687 105.062 39.687C104.553 39.687 104.033 39.6121 103.501 39.4624C103.172 39.7469 102.947 39.9977 102.828 40.2148C102.715 40.4245 102.659 40.6042 102.659 40.7539C102.659 40.8812 102.719 41.0047 102.839 41.1245C102.966 41.2443 103.209 41.3304 103.569 41.3828C103.778 41.4128 104.303 41.439 105.141 41.4614C106.683 41.4989 107.683 41.5513 108.14 41.6187C108.836 41.716 109.39 41.9743 109.802 42.3936C110.221 42.8128 110.431 43.3294 110.431 43.9434C110.431 44.7894 110.034 45.583 109.24 46.3242C108.072 47.4173 106.549 47.9639 104.669 47.9639C103.224 47.9639 102.004 47.6382 101.008 46.9868C100.447 46.6125 100.166 46.2231 100.166 45.8188C100.166 45.6392 100.207 45.4595 100.29 45.2798C100.417 45.0028 100.679 44.6172 101.076 44.123C101.128 44.0557 101.51 43.6514 102.221 42.9102C101.832 42.6781 101.555 42.4722 101.39 42.2925C101.233 42.1053 101.154 41.8957 101.154 41.6636C101.154 41.4015 101.259 41.0946 101.469 40.7427C101.686 40.3908 102.18 39.8929 102.951 39.249ZM104.905 32.9487C104.351 32.9487 103.887 33.1696 103.513 33.6113C103.138 34.0531 102.951 34.7306 102.951 35.644C102.951 36.827 103.206 37.7441 103.715 38.3955C104.104 38.8896 104.598 39.1367 105.197 39.1367C105.766 39.1367 106.234 38.9233 106.601 38.4966C106.968 38.0698 107.151 37.3997 107.151 36.4863C107.151 35.2959 106.893 34.3638 106.376 33.6899C105.995 33.1958 105.504 32.9487 104.905 32.9487ZM102.839 43C102.487 43.3818 102.221 43.7375 102.042 44.0669C101.862 44.3963 101.772 44.6995 101.772 44.9766C101.772 45.3359 101.989 45.6504 102.423 45.9199C103.172 46.3841 104.254 46.6162 105.669 46.6162C107.017 46.6162 108.009 46.3766 108.645 45.8975C109.289 45.4258 109.611 44.9204 109.611 44.3813C109.611 43.992 109.42 43.715 109.038 43.5503C108.649 43.3856 107.878 43.2882 106.725 43.2583C105.04 43.2134 103.745 43.1273 102.839 43Z"
                                    fill="white" />
                                <path
                                    d="M91.6982 34.5884C92.9036 33.1359 94.0529 32.4097 95.146 32.4097C95.7075 32.4097 96.1904 32.5519 96.5947 32.8364C96.999 33.1134 97.321 33.5739 97.5605 34.2178C97.7253 34.667 97.8076 35.3558 97.8076 36.2842V40.6753C97.8076 41.3267 97.86 41.7684 97.9648 42.0005C98.0472 42.1877 98.1782 42.3337 98.3579 42.4385C98.5451 42.5433 98.8857 42.5957 99.3799 42.5957V43H94.2925V42.5957H94.5059C94.985 42.5957 95.3182 42.5246 95.5054 42.3823C95.7 42.2326 95.8348 42.0155 95.9097 41.731C95.9396 41.6187 95.9546 41.2668 95.9546 40.6753V36.4639C95.9546 35.528 95.8311 34.8504 95.584 34.4312C95.3444 34.0044 94.9364 33.791 94.3599 33.791C93.4689 33.791 92.5817 34.2777 91.6982 35.251V40.6753C91.6982 41.3716 91.7394 41.8021 91.8218 41.9668C91.9266 42.1839 92.0688 42.3449 92.2485 42.4497C92.4357 42.547 92.8101 42.5957 93.3716 42.5957V43H88.2842V42.5957H88.5088C89.0329 42.5957 89.3848 42.4647 89.5645 42.2026C89.7516 41.9331 89.8452 41.424 89.8452 40.6753V36.8569C89.8452 35.6216 89.8153 34.8691 89.7554 34.5996C89.703 34.3301 89.6169 34.1466 89.4971 34.0493C89.3848 33.952 89.2313 33.9033 89.0366 33.9033C88.827 33.9033 88.5762 33.9595 88.2842 34.0718L88.1157 33.6675L91.2153 32.4097H91.6982V34.5884Z"
                                    fill="white" />
                                <path
                                    d="M84.915 27.0303C85.2295 27.0303 85.4953 27.1426 85.7124 27.3672C85.937 27.5843 86.0493 27.8501 86.0493 28.1646C86.0493 28.479 85.937 28.7485 85.7124 28.9731C85.4953 29.1978 85.2295 29.3101 84.915 29.3101C84.6006 29.3101 84.3311 29.1978 84.1064 28.9731C83.8818 28.7485 83.7695 28.479 83.7695 28.1646C83.7695 27.8501 83.8781 27.5843 84.0952 27.3672C84.3198 27.1426 84.5931 27.0303 84.915 27.0303ZM85.8472 32.4097V40.6753C85.8472 41.3192 85.8921 41.7497 85.9819 41.9668C86.0793 42.1764 86.2178 42.3337 86.3975 42.4385C86.5846 42.5433 86.9215 42.5957 87.4082 42.5957V43H82.4106V42.5957C82.9123 42.5957 83.2492 42.547 83.4214 42.4497C83.5936 42.3524 83.7284 42.1914 83.8257 41.9668C83.9305 41.7422 83.9829 41.3117 83.9829 40.6753V36.7109C83.9829 35.5954 83.9492 34.8729 83.8818 34.5435C83.8294 34.3039 83.7471 34.1392 83.6348 34.0493C83.5225 33.952 83.369 33.9033 83.1743 33.9033C82.9647 33.9033 82.7101 33.9595 82.4106 34.0718L82.2534 33.6675L85.353 32.4097H85.8472Z"
                                    fill="white" />
                                <path
                                    d="M73.8418 27.0303V37.2725L76.4585 34.8804C77.0125 34.3713 77.3345 34.0493 77.4243 33.9146C77.4842 33.8247 77.5142 33.7349 77.5142 33.645C77.5142 33.4953 77.4505 33.368 77.3232 33.2632C77.2035 33.1509 77.0013 33.0872 76.7168 33.0723V32.7129H81.1865V33.0723C80.5726 33.0872 80.0597 33.1808 79.6479 33.353C79.2437 33.5252 78.7982 33.8322 78.3115 34.2739L75.6724 36.7109L78.3115 40.0464C79.0452 40.9673 79.5394 41.5513 79.7939 41.7983C80.1533 42.1502 80.4678 42.3786 80.7373 42.4834C80.9245 42.5583 81.2502 42.5957 81.7144 42.5957V43H76.7168V42.5957C77.0013 42.5882 77.1922 42.547 77.2896 42.4722C77.3944 42.3898 77.4468 42.2775 77.4468 42.1353C77.4468 41.9631 77.297 41.686 76.9976 41.3042L73.8418 37.2725V40.6865C73.8418 41.3529 73.8867 41.7909 73.9766 42.0005C74.0739 42.2101 74.2087 42.3599 74.3809 42.4497C74.5531 42.5396 74.9274 42.5882 75.5039 42.5957V43H70.2705V42.5957C70.7946 42.5957 71.1877 42.5321 71.4497 42.4048C71.6069 42.3224 71.7267 42.1951 71.8091 42.0229C71.9214 41.7759 71.9775 41.3491 71.9775 40.7427V31.3765C71.9775 30.186 71.9513 29.4598 71.8989 29.1978C71.8465 28.9282 71.7604 28.7448 71.6406 28.6475C71.5208 28.5426 71.3636 28.4902 71.1689 28.4902C71.0117 28.4902 70.7759 28.5539 70.4614 28.6812L70.2705 28.2881L73.3252 27.0303H73.8418Z"
                                    fill="white" />
                                <path
                                    d="M62.2969 34.5884C63.5023 33.1359 64.6515 32.4097 65.7446 32.4097C66.3062 32.4097 66.7891 32.5519 67.1934 32.8364C67.5977 33.1134 67.9196 33.5739 68.1592 34.2178C68.3239 34.667 68.4062 35.3558 68.4062 36.2842V40.6753C68.4062 41.3267 68.4587 41.7684 68.5635 42.0005C68.6458 42.1877 68.7769 42.3337 68.9565 42.4385C69.1437 42.5433 69.4844 42.5957 69.9785 42.5957V43H64.8911V42.5957H65.1045C65.5837 42.5957 65.9168 42.5246 66.104 42.3823C66.2987 42.2326 66.4334 42.0155 66.5083 41.731C66.5382 41.6187 66.5532 41.2668 66.5532 40.6753V36.4639C66.5532 35.528 66.4297 34.8504 66.1826 34.4312C65.943 34.0044 65.535 33.791 64.9585 33.791C64.0675 33.791 63.1803 34.2777 62.2969 35.251V40.6753C62.2969 41.3716 62.3381 41.8021 62.4204 41.9668C62.5252 42.1839 62.6675 42.3449 62.8472 42.4497C63.0343 42.547 63.4087 42.5957 63.9702 42.5957V43H58.8828V42.5957H59.1074C59.6315 42.5957 59.9834 42.4647 60.1631 42.2026C60.3503 41.9331 60.4438 41.424 60.4438 40.6753V36.8569C60.4438 35.6216 60.4139 34.8691 60.354 34.5996C60.3016 34.3301 60.2155 34.1466 60.0957 34.0493C59.9834 33.952 59.8299 33.9033 59.6353 33.9033C59.4256 33.9033 59.1748 33.9595 58.8828 34.0718L58.7144 33.6675L61.814 32.4097H62.2969V34.5884Z"
                                    fill="white" />
                                <path
                                    d="M54.9072 41.5176C53.8516 42.3337 53.189 42.8053 52.9194 42.9326C52.5151 43.1198 52.0846 43.2134 51.6279 43.2134C50.9167 43.2134 50.3289 42.9701 49.8647 42.4834C49.408 41.9967 49.1797 41.3566 49.1797 40.563C49.1797 40.0614 49.292 39.6271 49.5166 39.2603C49.8236 38.7511 50.3551 38.272 51.1113 37.8228C51.875 37.3735 53.1403 36.827 54.9072 36.1831V35.7788C54.9072 34.7531 54.7425 34.0493 54.4131 33.6675C54.0911 33.2856 53.6195 33.0947 52.998 33.0947C52.5264 33.0947 52.152 33.222 51.875 33.4766C51.5905 33.7311 51.4482 34.0231 51.4482 34.3525L51.4707 35.0039C51.4707 35.3483 51.3809 35.6141 51.2012 35.8013C51.029 35.9884 50.8006 36.082 50.5161 36.082C50.2391 36.082 50.0107 35.9847 49.8311 35.79C49.6589 35.5954 49.5728 35.3296 49.5728 34.9927C49.5728 34.3488 49.9022 33.7573 50.561 33.2183C51.2199 32.6792 52.1445 32.4097 53.335 32.4097C54.2484 32.4097 54.9971 32.5632 55.5811 32.8701C56.0228 33.1022 56.3485 33.4653 56.5581 33.9595C56.6929 34.2814 56.7603 34.9403 56.7603 35.936V39.4287C56.7603 40.4095 56.779 41.0122 56.8164 41.2368C56.8538 41.4539 56.9137 41.5999 56.9961 41.6748C57.0859 41.7497 57.187 41.7871 57.2993 41.7871C57.4191 41.7871 57.5239 41.7609 57.6138 41.7085C57.771 41.6112 58.0742 41.3379 58.5234 40.8887V41.5176C57.6849 42.6406 56.8838 43.2021 56.1201 43.2021C55.7533 43.2021 55.4613 43.0749 55.2441 42.8203C55.027 42.5658 54.9147 42.1315 54.9072 41.5176ZM54.9072 40.7876V36.8682C53.7767 37.3174 53.0467 37.6356 52.7173 37.8228C52.1258 38.1522 51.7028 38.4966 51.4482 38.856C51.1937 39.2153 51.0664 39.6084 51.0664 40.0352C51.0664 40.5742 51.2274 41.0234 51.5493 41.3828C51.8713 41.7347 52.2419 41.9106 52.6611 41.9106C53.2301 41.9106 53.9788 41.5363 54.9072 40.7876Z"
                                    fill="white" />
                                <path
                                    d="M48.562 43H44.4966L39.3418 35.8799C38.96 35.8949 38.6493 35.9023 38.4097 35.9023C38.3123 35.9023 38.2075 35.9023 38.0952 35.9023C37.9829 35.8949 37.8669 35.8874 37.7471 35.8799V40.3047C37.7471 41.263 37.8519 41.8582 38.0615 42.0903C38.346 42.4198 38.7728 42.5845 39.3418 42.5845H39.937V43H33.4121V42.5845H33.9849C34.6287 42.5845 35.0892 42.3748 35.3662 41.9556C35.5234 41.7235 35.6021 41.1732 35.6021 40.3047V30.4668C35.6021 29.5085 35.4972 28.9132 35.2876 28.6812C34.9956 28.3517 34.5614 28.187 33.9849 28.187H33.4121V27.7715H38.96C40.5771 27.7715 41.7676 27.8913 42.5312 28.1309C43.3024 28.363 43.9538 28.7972 44.4854 29.4336C45.0244 30.0625 45.2939 30.8149 45.2939 31.6909C45.2939 32.6268 44.987 33.4391 44.373 34.1279C43.7666 34.8167 42.8232 35.3034 41.543 35.5879L44.6875 39.9565C45.4062 40.9598 46.0239 41.6261 46.5405 41.9556C47.0571 42.285 47.731 42.4946 48.562 42.5845V43ZM37.7471 35.1724C37.8893 35.1724 38.0129 35.1761 38.1177 35.1836C38.2225 35.1836 38.3086 35.1836 38.376 35.1836C39.8284 35.1836 40.9216 34.8691 41.6553 34.2402C42.3965 33.6113 42.7671 32.8102 42.7671 31.8369C42.7671 30.8861 42.4676 30.1149 41.8687 29.5234C41.2772 28.9245 40.491 28.625 39.5103 28.625C39.076 28.625 38.4883 28.6961 37.7471 28.8384V35.1724Z"
                                    fill="white" />
                                <path
                                    d="M121.625 98.9375C122.604 98.9375 123.427 99.2812 124.094 99.9688C124.76 100.635 125.094 101.448 125.094 102.406C125.094 103.365 124.75 104.188 124.062 104.875C123.396 105.542 122.583 105.875 121.625 105.875C120.667 105.875 119.844 105.542 119.156 104.875C118.49 104.188 118.156 103.365 118.156 102.406C118.156 101.427 118.49 100.604 119.156 99.9375C119.844 99.2708 120.667 98.9375 121.625 98.9375Z"
                                    fill="white" />
                                <path
                                    d="M97.625 75.5312C101.958 75.5312 105.438 77.1771 108.062 80.4688C110.292 83.2812 111.406 86.5104 111.406 90.1562C111.406 92.7188 110.792 95.3125 109.562 97.9375C108.333 100.562 106.635 102.542 104.469 103.875C102.323 105.208 99.9271 105.875 97.2812 105.875C92.9688 105.875 89.5417 104.156 87 100.719C84.8542 97.8229 83.7812 94.5729 83.7812 90.9688C83.7812 88.3438 84.4271 85.7396 85.7188 83.1562C87.0312 80.5521 88.75 78.6354 90.875 77.4062C93 76.1562 95.25 75.5312 97.625 75.5312ZM96.6562 77.5625C95.5521 77.5625 94.4375 77.8958 93.3125 78.5625C92.2083 79.2083 91.3125 80.3542 90.625 82C89.9375 83.6458 89.5938 85.7604 89.5938 88.3438C89.5938 92.5104 90.4167 96.1042 92.0625 99.125C93.7292 102.146 95.9167 103.656 98.625 103.656C100.646 103.656 102.312 102.823 103.625 101.156C104.938 99.4896 105.594 96.625 105.594 92.5625C105.594 87.4792 104.5 83.4792 102.312 80.5625C100.833 78.5625 98.9479 77.5625 96.6562 77.5625Z"
                                    fill="white" />
                                <path
                                    d="M34.5312 62.625H46.0312L71.9375 94.4062V69.9688C71.9375 67.3646 71.6458 65.7396 71.0625 65.0938C70.2917 64.2188 69.0729 63.7812 67.4062 63.7812H65.9375V62.625H80.6875V63.7812H79.1875C77.3958 63.7812 76.125 64.3229 75.375 65.4062C74.9167 66.0729 74.6875 67.5938 74.6875 69.9688V105.688H73.5625L45.625 71.5625V97.6562C45.625 100.26 45.9062 101.885 46.4688 102.531C47.2604 103.406 48.4792 103.844 50.125 103.844H51.625V105H36.875V103.844H38.3438C40.1562 103.844 41.4375 103.302 42.1875 102.219C42.6458 101.552 42.875 100.031 42.875 97.6562V68.1875C41.6458 66.75 40.7083 65.8021 40.0625 65.3438C39.4375 64.8854 38.5104 64.4583 37.2812 64.0625C36.6771 63.875 35.7604 63.7812 34.5312 63.7812V62.625Z"
                                    fill="white" />
                                <path
                                    d="M189.56 90.5991L184.318 105H140.178V102.958C153.162 91.1141 162.303 81.4399 167.6 73.936C172.897 66.4321 175.545 59.5719 175.545 53.3555C175.545 48.6104 174.092 44.7113 171.187 41.6582C168.281 38.6051 164.805 37.0786 160.758 37.0786C157.08 37.0786 153.769 38.1637 150.827 40.334C147.921 42.4674 145.769 45.6125 144.371 49.769H142.33C143.249 42.964 145.603 37.7407 149.392 34.0991C153.218 30.4575 157.981 28.6367 163.683 28.6367C169.752 28.6367 174.81 30.5863 178.856 34.4854C182.939 38.3844 184.98 42.9824 184.98 48.2793C184.98 52.068 184.098 55.8568 182.332 59.6455C179.61 65.6045 175.196 71.9129 169.09 78.5708C159.931 88.576 154.211 94.6086 151.93 96.6685H171.462C175.435 96.6685 178.212 96.5213 179.794 96.2271C181.412 95.9328 182.865 95.3442 184.153 94.4614C185.44 93.5418 186.562 92.2544 187.519 90.5991H189.56Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_8_59" x1="11.4583" y1="137"
                                        x2="216.03" y2="-5.69119" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.524038" stop-color="#5D5D5D" />
                                        <stop offset="1" stop-color="#D3CCA8" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="ranking-badge-button">
                    <div class="ranking-badge-diamond">
                        <svg width="188" height="188" viewBox="0 0 188 188" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M94 0L188 94L94 188L0 94L94 0Z" fill="url(#paint0_linear_ranking_badge)" />
                            <defs>
                                <linearGradient id="paint0_linear_ranking_badge" x1="94" y1="0"
                                    x2="94" y2="188" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="ranking-badge-text">一覧を見る</p>
                </div>
                <div class="ranking-header">
                    <div class="ranking-header-bg">
                        <img src="{{ asset('assets/img/shops/shizuku/ranking.png') }}" alt="Background">
                        <div class="ranking-header-overlay"></div>
                        <div class="ranking-header-shadow"></div>
                    </div>
                    <div class="ranking-header-content">
                        <h1 class="ranking-title-en">RANKING</h1>
                        <div class="ranking-title-ja-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="30"
                                viewBox="0 0 34 30" fill="none">
                                <path
                                    d="M5 30V26.6667H28.3333V30H5ZM5 24.1667L2.875 10.7917C2.81945 10.7917 2.75667 10.7989 2.68667 10.8133C2.61667 10.8278 2.55445 10.8344 2.5 10.8333C1.80556 10.8333 1.21556 10.59 0.730004 10.1033C0.244448 9.61667 0.0011149 9.02667 3.78788e-06 8.33334C-0.00110732 7.64 0.242226 7.05 0.730004 6.56334C1.21778 6.07667 1.80778 5.83334 2.5 5.83334C3.19223 5.83334 3.78278 6.07667 4.27167 6.56334C4.76056 7.05 5.00334 7.64 5 8.33334C5 8.52778 4.97889 8.70834 4.93667 8.875C4.89445 9.04167 4.84612 9.19445 4.79167 9.33334L10 11.6667L15.2083 4.54167C14.9028 4.31945 14.6528 4.02778 14.4583 3.66667C14.2639 3.30556 14.1667 2.91667 14.1667 2.5C14.1667 1.80556 14.41 1.215 14.8967 0.728337C15.3833 0.241671 15.9733 -0.00110731 16.6667 3.79651e-06C17.36 0.00111491 17.9506 0.244448 18.4383 0.730004C18.9261 1.21556 19.1689 1.80556 19.1667 2.5C19.1667 2.91667 19.0695 3.30556 18.875 3.66667C18.6806 4.02778 18.4306 4.31945 18.125 4.54167L23.3333 11.6667L28.5417 9.33334C28.4861 9.19445 28.4372 9.04167 28.395 8.875C28.3528 8.70834 28.3322 8.52778 28.3333 8.33334C28.3333 7.63889 28.5767 7.04834 29.0633 6.56167C29.55 6.075 30.14 5.83223 30.8333 5.83334C31.5267 5.83445 32.1172 6.07778 32.605 6.56334C33.0928 7.04889 33.3356 7.63889 33.3333 8.33334C33.3311 9.02778 33.0883 9.61834 32.605 10.105C32.1217 10.5917 31.5311 10.8344 30.8333 10.8333C30.7778 10.8333 30.7156 10.8267 30.6467 10.8133C30.5778 10.8 30.515 10.7928 30.4583 10.7917L28.3333 24.1667H5Z"
                                    fill="white" />
                            </svg>
                            <h2 class="ranking-title-ja">ランキング</h2>
                        </div>
                        <p class="ranking-description">当店の女の子ランキング情報です</p>
                    </div>
                </div>
            </div>
            <x-public.shops.event-section background-image="assets/img/shops/shizuku/event-bg.png"
                background-alt="Event Background" main-banner-image="assets/img/shops/shizuku/event-main.png"
                main-banner-alt="Main Banner Background" :sub-banner-images="[
                    ['image' => 'assets/img/shops/shizuku/event-main.png', 'alt' => 'Event Sub Banner'],
                    ['image' => 'assets/img/shops/shizuku/event-second.png', 'alt' => 'Event Sub Banner'],
                    ['image' => 'assets/img/shops/shizuku/event-main.png', 'alt' => 'Event Sub Banner'],
                    ['image' => 'assets/img/shops/shizuku/event-second.png', 'alt' => 'Event Sub Banner'],
                ]" />
            <x-public.shops.footer :shops="[
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 1',
                    'text1' => '上品な空間、時を忘れる美貌と',
                    'text2' => 'おもてなしが魅力のヘルス',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 2',
                    'text1' => '女の子を見て選べる唯一無二の',
                    'text2' => 'エンターテインメントヘルス',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 3',
                    'text1' => '雅は、すすきの屈指の人妻・痴女が',
                    'text2' => '在籍するヘルス',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 4',
                    'text1' => '若妻、人妻、淫乱妻など大人のエロさ溢れる',
                    'text2' => '人妻ヘルス店',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 5',
                    'text1' => '容姿端麗なオトナ女性による',
                    'text2' => '丁寧な本格マッサージ店',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 6',
                    'text1' => 'アナタ色のエッチな女の子に育てられる',
                    'text2' => '育成型ヘルス',
                    'url' => '#',
                ],
            ]" :external-links="[
                [
                    'image' => 'assets/img/shops/shizuku/external-link-1.png',
                    'alt' => '全国 駅ちか人気！風俗ランキング',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-4.png',
                    'alt' => 'VANILLA',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-2.png',
                    'alt' => '風俗求人情報 NO.1 Heaven すすきの求人',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-3.png',
                    'alt' => '女の子掲載数 NO.1 Heaven ネット すすきの風俗',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-2.png',
                    'alt' => '風俗求人情報 NO.1 Heaven すすきの求人',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-3.png',
                    'alt' => '女の子掲載数 NO.1 Heaven ネット すすきの風俗',
                    'url' => '#',
                ],
            ]" :menu-links="[
                ['text' => '店舗TOP', 'url' => '#'],
                ['text' => '出勤情報', 'url' => '#'],
                ['text' => '料金システム', 'url' => '#'],
                ['text' => 'キャスト一覧', 'url' => '#'],
                ['text' => '新着情報', 'url' => '#'],
                ['text' => 'SNS', 'url' => '#'],
                ['text' => '店舗一覧', 'url' => '#'],
                ['text' => 'ログイン', 'url' => '#'],
                ['text' => '新規会員登録', 'url' => '#'],
                [
                    'text' => 'メルマガ',
                    'url' => 'https://17auto.biz/plogroup/registp/entryform2.htm',
                    'target' => '_blank',
                ],
                ['text' => '女性求人', 'url' => '#'],
                ['text' => '男性求人', 'url' => '#'],
                ['text' => '個人情報保護方針', 'url' => 'https://plo-group.jp/privacy-policy', 'target' => '_blank'],
                ['text' => 'グループTOP', 'url' => 'https://plo-group.jp/', 'target' => '_blank'],
            ]" />
        </div>

        <!-- Fixed Phone Button -->
        <x-public.shops.fixed-phone-button phone-number="0115338988" phone-display="011-533-8988"
            hours="8:30〜24:00まで" mobile-text="TEL" />

        <!-- Fixed Side Buttons -->
        <x-public.shops.fixed-side-buttons />
    </div>
</x-shizuku-layout>

@once
    @vite(['resources/scss/shops/shizuku/home.scss', 'resources/js/shops/shizuku/home.js', 'resources/js/shops/home-header.js', 'resources/js/shops/news-section.js', 'resources/js/shops/new-girl-slider.js', 'resources/js/shops/castlist-slider.js'])
@endonce
