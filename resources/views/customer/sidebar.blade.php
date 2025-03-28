<div class="sherah-smenu">
    <div class="admin-menu">
        <!-- Logo -->
        <div class="logo sherah-sidebar-padding">
            <a href="{{ route('customer.product.list') }}">
                <img class="sherah-logo__main" src="{{ asset('backend/assets/img/logo.png') }}" alt="#">
            </a>
            <div class="sherah__sicon close-icon d-xl-none">
                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.19855 7.41927C4.22908 5.52503 2.34913 3.72698 0.487273 1.90989C0.274898 1.70227 0.0977597 1.40419 0.026333 1.11848C-0.0746168 0.717537 0.122521 0.36707 0.483464 0.154695C0.856788 -0.0643475 1.24249 -0.0519669 1.60248 0.199455C1.73105 0.289929 1.84438 0.404212 1.95771 0.514685C4.00528 2.48321 6.05189 4.45173 8.09755 6.4212C8.82896 7.12499 8.83372 7.6145 8.11565 8.30687C6.05856 10.2878 4.00052 12.2677 1.94152 14.2467C1.82724 14.3562 1.71391 14.4696 1.58439 14.5591C1.17773 14.841 0.615842 14.781 0.27966 14.4324C-0.056522 14.0829 -0.0946163 13.5191 0.202519 13.1248C0.296802 12.9991 0.415847 12.8915 0.530129 12.781C2.29104 11.0868 4.05194 9.39351 5.81571 7.70212C5.91761 7.60593 6.04332 7.53355 6.19855 7.41927Z">
                    </path>
                </svg>
            </div>
        </div>
        <!-- Main Menu -->
        <div class="admin-menu__one sherah-sidebar-padding">
            <!-- Nav Menu -->
            <div class="menu-bar">
                <ul class="menu-bar__one sherah-dashboard-menu" id="sherahMenu">
                    <li><a href="{{ route('customer.product.list') }}" data-bs-toggle="collapse"
                            data-bs-target="#menu-item_home"><span class="menu-bar__text">
                                <span class="sherah-menu-icon sherah-svg-icon__v1">
                                    <svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="18.075"
                                        height="18.075" viewBox="0 0 18.075 18.075">
                                        <g id="Icon" transform="translate(0 0)">
                                            <path id="Path_29" data-name="Path 29"
                                                d="M6.966,6.025H1.318A1.319,1.319,0,0,1,0,4.707V1.318A1.319,1.319,0,0,1,1.318,0H6.966A1.319,1.319,0,0,1,8.284,1.318V4.707A1.319,1.319,0,0,1,6.966,6.025ZM1.318,1.13a.188.188,0,0,0-.188.188V4.707a.188.188,0,0,0,.188.188H6.966a.188.188,0,0,0,.188-.188V1.318a.188.188,0,0,0-.188-.188Zm0,0" />
                                            <path id="Path_30" data-name="Path 30"
                                                d="M6.966,223.876H1.318A1.319,1.319,0,0,1,0,222.558V214.65a1.319,1.319,0,0,1,1.318-1.318H6.966a1.319,1.319,0,0,1,1.318,1.318v7.908A1.319,1.319,0,0,1,6.966,223.876Zm-5.648-9.414a.188.188,0,0,0-.188.188v7.908a.188.188,0,0,0,.188.188H6.966a.188.188,0,0,0,.188-.188V214.65a.188.188,0,0,0-.188-.188Zm0,0"
                                                transform="translate(0 -205.801)" />
                                            <path id="Path_31" data-name="Path 31"
                                                d="M284.3,347.357H278.65a1.319,1.319,0,0,1-1.318-1.318V342.65a1.319,1.319,0,0,1,1.318-1.318H284.3a1.319,1.319,0,0,1,1.318,1.318v3.389A1.319,1.319,0,0,1,284.3,347.357Zm-5.648-4.9a.188.188,0,0,0-.188.188v3.389a.188.188,0,0,0,.188.188H284.3a.188.188,0,0,0,.188-.188V342.65a.188.188,0,0,0-.188-.188Zm0,0"
                                                transform="translate(-267.542 -329.282)" />
                                            <path id="Path_32" data-name="Path 32"
                                                d="M284.3,10.544H278.65a1.319,1.319,0,0,1-1.318-1.318V1.318A1.319,1.319,0,0,1,278.65,0H284.3a1.319,1.319,0,0,1,1.318,1.318V9.226A1.319,1.319,0,0,1,284.3,10.544ZM278.65,1.13a.188.188,0,0,0-.188.188V9.226a.188.188,0,0,0,.188.188H284.3a.188.188,0,0,0,.188-.188V1.318a.188.188,0,0,0-.188-.188Zm0,0"
                                                transform="translate(-267.542)" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Product</span></span></a></span>

                    </li>
                    {{-- <li><a href="#!" class="collapsed" data-bs-toggle="collapse"
                            data-bs-target="#menu-item__customers"><span class="menu-bar__text">
                                <span class="sherah-menu-icon sherah-svg-icon__v1">
                                    <svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="21.732"
                                        height="18" viewBox="0 0 21.732 18">
                                        <g id="Icon" transform="translate(-525.662 -352.927)">
                                            <path id="Path_208" data-name="Path 208"
                                                d="M536.507,455.982q-4.327,0-8.654,0a1.953,1.953,0,0,1-2.188-2.2c0-.99-.005-1.979,0-2.969a3.176,3.176,0,0,1,3.309-3.315c.875,0,1.749.052,2.624.062a.451.451,0,0,0,.33-.168,3.237,3.237,0,0,1,2.94-1.527q1.654.024,3.309,0a3.262,3.262,0,0,1,2.947,1.52.621.621,0,0,0,.449.153,30.091,30.091,0,0,1,3.212.044,3.044,3.044,0,0,1,2.594,3.014c.021,1.117.014,2.234.005,3.351a1.909,1.909,0,0,1-2.054,2.032Q540.919,455.989,536.507,455.982Zm3.812-1.288c0-.187,0-.326,0-.465-.008-1.781.026-3.564-.042-5.342a1.8,1.8,0,0,0-1.929-1.74c-1.131-.012-2.263,0-3.394,0a1.961,1.961,0,0,0-2.22,2.212q0,2.439,0,4.878v.46Zm-8.89.011c.013-.11.026-.165.026-.22,0-1.781-.006-3.562.009-5.343,0-.337-.178-.37-.422-.37-.749,0-1.5-.024-2.248.006a1.849,1.849,0,0,0-1.837,1.763c-.044,1.172-.022,2.346-.013,3.519a.581.581,0,0,0,.6.639C528.826,454.716,530.111,454.705,531.429,454.705Zm10.165-.005c1.354,0,2.664.018,3.974-.011.377-.008.544-.315.544-.688,0-1.117.017-2.234-.007-3.35a1.867,1.867,0,0,0-1.823-1.87c-.762-.035-1.526,0-2.29-.01-.3,0-.41.114-.406.431.017,1.4.007,2.8.007,4.2Z"
                                                transform="translate(0 -85.056)" />
                                            <path id="Path_209" data-name="Path 209"
                                                d="M609.243,356.712a3.775,3.775,0,1,1,3.788,3.764A3.775,3.775,0,0,1,609.243,356.712Zm1.279-.076a2.5,2.5,0,1,0,2.611-2.434A2.5,2.5,0,0,0,610.523,356.636Z"
                                                transform="translate(-76.492)" />
                                            <path id="Path_210" data-name="Path 210"
                                                d="M548.151,397.022a2.819,2.819,0,1,1-2.842-2.82A2.827,2.827,0,0,1,548.151,397.022Zm-1.278.023a1.542,1.542,0,1,0-1.531,1.542A1.548,1.548,0,0,0,546.873,397.045Z"
                                                transform="translate(-15.421 -37.775)" />
                                            <path id="Path_211" data-name="Path 211"
                                                d="M698.51,397.045a2.819,2.819,0,1,1,2.839,2.819A2.831,2.831,0,0,1,698.51,397.045Zm4.361.032a1.542,1.542,0,1,0-1.56,1.512A1.55,1.55,0,0,0,702.871,397.076Z"
                                                transform="translate(-158.187 -37.776)" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Products</span></span> <span
                                class="sherah__toggle"></span></a></span>
                        <!-- Dropdown Menu -->
                        <div class="collapse sherah__dropdown" id="menu-item__customers" data-bs-parent="#sherahMenu">
                            <ul class="menu-bar__one-dropdown">
                                <li><a href="{{ route('customer.product.list') }}"><span class="menu-bar__text"><span
                                                class="menu-bar__name">Products</span></span></a></li>
                            </ul>
                        </div>
                    </li> --}}
                    <li><a href="#!" class="collapsed" data-bs-toggle="collapse"
                            data-bs-target="#menu-item__orders"><span class="menu-bar__text">
                                <span class="sherah-menu-icon sherah-svg-icon__v1">
                                    <svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="17.092"
                                        height="17.873" viewBox="0 0 17.092 17.873">
                                        <g id="Icon" transform="translate(-409.241 -375.497)">
                                            <path id="Path_219" data-name="Path 219"
                                                d="M413.466,380.6a15.992,15.992,0,0,1,.123-1.943,4.18,4.18,0,0,1,4.549-3.151,4.054,4.054,0,0,1,3.919,3.741c.009.436,0,.872,0,1.354h2.872c.193,0,.386,0,.579,0,.589.012.879.286.813.811-.4,3.247-.8,6.495-1.227,9.739a2.674,2.674,0,0,1-2.769,2.2q-4.543.022-9.086,0a2.681,2.681,0,0,1-2.771-2.2c-.344-2.558-.649-5.12-.97-7.68-.078-.62-.147-1.242-.234-1.861-.108-.759.125-1.011.967-1.012Zm-2.723,1.3c.062.5.119.978.177,1.452.306,2.481.606,4.963.924,7.443.114.888.642,1.293,1.628,1.294q4.32,0,8.639,0a2.279,2.279,0,0,0,.57-.059,1.428,1.428,0,0,0,1.074-1.446c.213-1.836.452-3.669.679-5.5.13-1.052.257-2.1.387-3.174h-2.742v1.215c.038.015.076.032.115.046.437.159.649.424.563.746a.73.73,0,0,1-.826.524c-.43-.008-.861.008-1.291-.006a.668.668,0,0,1-.711-.588c-.021-.423.28-.612.676-.709v-1.218h-5.655v1.221c.434.1.724.3.683.722a.613.613,0,0,1-.636.565c-.518.026-1.039.024-1.558,0-.349-.016-.627-.224-.614-.526a1.458,1.458,0,0,1,.364-.659c.051-.071.2-.084.292-.118V381.9Zm4.154-1.321h5.727c0-.514.036-1-.007-1.491a2.723,2.723,0,0,0-2.627-2.306,2.77,2.77,0,0,0-2.967,1.982A12.7,12.7,0,0,0,414.9,380.578Z"
                                                transform="translate(0 0)" />
                                            <path id="Path_220" data-name="Path 220"
                                                d="M475.527,506.525c.71-.887,1.409-1.754,2.1-2.627a.66.66,0,0,1,.828-.285.609.609,0,0,1,.258.961c-.841,1.079-1.7,2.145-2.563,3.206a.6.6,0,0,1-.858.123c-.635-.412-1.267-.829-1.89-1.259a.635.635,0,1,1,.71-1.053C474.584,505.888,475.043,506.2,475.527,506.525Z"
                                                transform="translate(-57.815 -117.848)" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Bids</span></span><span
                                class="sherah__toggle"></span></a></span>
                        <!-- Dropdown Menu -->
                        <div class="collapse sherah__dropdown" id="menu-item__orders" data-bs-parent="#sherahMenu">
                            <ul class="menu-bar__one-dropdown">
                                <li><a href="{{ route('customer.custom.bid.request') }}">
                                        <span class="menu-bar__text"><span class="menu-bar__name">Custom Bid
                                                Request</span></span>
                                    </a></li>
                                <li><a
                                        href="{{ route('customer.bid.request', ['id' => optional(auth()->user())->id ?? null]) }}">
                                        <span class="menu-bar__text"><span class="menu-bar__name">Bid
                                                Request List</span></span>
                                    </a></li>
                                {{-- <li><a
                                        href="{{ route('customer.bid.list', ['id' => optional(auth()->user())->id ?? null]) }}">
                                        <span class="menu-bar__text"><span class="menu-bar__name">Bid List</span></span>
                                    </a></li> --}}
                            </ul>

                        </div>
                    </li>
                    <li><a href="{{ route('customer.invoice') }}" class="collapsed"><span class="menu-bar__text">
                                <span class="sherah-menu-icon sherah-svg-icon__v1">
                                    <svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="19.434"
                                        height="19.432" viewBox="0 0 19.434 19.432">
                                        <g id="Icon" transform="translate(791.246 88.341)">
                                            <path id="Path_543" data-name="Path 543"
                                                d="M-777.581-68.909h-7.894c-.047-.028-.1-.056-.142-.084a.559.559,0,0,1,0-.96,1.139,1.139,0,0,1,.435-.091c.181-.018.415.051.531-.039s.118-.331.162-.507c.113-.445.221-.891.336-1.354h-.229c-1.707,0-3.415,0-5.122,0a1.7,1.7,0,0,1-1.733-1.689q-.009-5.331,0-10.661a1.655,1.655,0,0,1,1.414-1.653,9.177,9.177,0,0,1,1.229-.037c.39,0,.78,0,1.188,0,0-.542.015-1.066-.005-1.589a.715.715,0,0,1,.423-.764h7.894c.15.121.311.231.447.366.629.62,1.25,1.25,1.881,1.869a.437.437,0,0,0,.275.114c.991.008,1.982-.005,2.973.009a1.654,1.654,0,0,1,1.574,1.046,3.569,3.569,0,0,1,.136.43v11.082a.284.284,0,0,0-.025.051,1.709,1.709,0,0,1-1.842,1.429H-778.9c.154.619.3,1.207.452,1.793a.189.189,0,0,0,.142.1c.2.012.392,0,.588.007a.57.57,0,0,1,.542.449.569.569,0,0,1-.3.621C-777.51-68.955-777.545-68.931-777.581-68.909Zm.784-6.46v-8.8c-.613,0-1.214-.013-1.813,0-1.142.03-1.243-.07-1.212-1.2.015-.543,0-1.087,0-1.631v-.2h-6.441v11.824Zm3.839,0c0-.043.008-.068.008-.092q0-4.4,0-8.8a.567.567,0,0,0-.6-.589c-.512,0-1.024,0-1.536,0h-.543v9.481Zm-14.461-9.481h-2.022a.586.586,0,0,0-.663.664q0,4.307,0,8.615v.2h2.686Zm14.468,10.639h-17.154c0,.144,0,.276,0,.407,0,.52.2.719.723.719h15.707c.057,0,.114,0,.171,0a.568.568,0,0,0,.552-.544C-772.945-73.818-772.952-74.007-772.952-74.21Zm-10.5,4.152h3.847c-.151-.606-.3-1.2-.45-1.791a.17.17,0,0,0-.13-.092q-1.345-.008-2.69,0a.157.157,0,0,0-.123.077C-783.153-71.267-783.3-70.668-783.452-70.058Zm4.825-16.319-.04.024v1.032h1.067c-.316-.314-.608-.6-.9-.892A1.778,1.778,0,0,1-778.627-86.377Z" />
                                            <path id="Path_544" data-name="Path 544"
                                                d="M-666.357-27.7c-.332-.141-.639-.252-.927-.4a.372.372,0,0,1-.19-.551c.119-.2.337-.228.581-.095.157.086.324.153.535.251v-.411c0-.417,0-.835,0-1.252a.184.184,0,0,0-.124-.2,2.748,2.748,0,0,1-.284-.152,1.146,1.146,0,0,1-.626-1.18,1.288,1.288,0,0,1,.863-1.164c.127-.049.176-.1.172-.239-.009-.3.135-.469.371-.47s.377.173.385.465c0,.044.005.087,0,.081a6.594,6.594,0,0,1,.728.41.484.484,0,0,1,.162.356.368.368,0,0,1-.6.258c-.085-.06-.171-.119-.3-.207,0,.475,0,.9,0,1.328,0,.031.041.069.073.091a.567.567,0,0,0,.123.049,1.412,1.412,0,0,1,1.021,1.279,1.586,1.586,0,0,1-.952,1.547c-.2.084-.3.171-.274.4a.345.345,0,0,1-.246.366.323.323,0,0,1-.382-.082.692.692,0,0,1-.12-.286A.661.661,0,0,1-666.357-27.7Zm.769-.944a.783.783,0,0,0,.449-.764.6.6,0,0,0-.449-.566Zm-.779-3.426a.56.56,0,0,0-.266.564.343.343,0,0,0,.266.319Z"
                                                transform="translate(-117.452 -52.004)" />
                                            <path id="Path_545" data-name="Path 545"
                                                d="M-666.831,115.647c.992,0,1.984,0,2.976,0a.567.567,0,0,1,.555.8.584.584,0,0,1-.586.336q-1.981,0-3.962,0-.986,0-1.971,0a.577.577,0,0,1-.637-.575.577.577,0,0,1,.63-.563Z"
                                                transform="translate(-114.678 -193.665)" />
                                            <path id="Path_546" data-name="Path 546"
                                                d="M-586.439,26.771c-.3,0-.606,0-.909,0a.574.574,0,0,1-.607-.566.571.571,0,0,1,.6-.572q.918,0,1.836,0a.57.57,0,0,1,.6.574.57.57,0,0,1-.591.562C-585.821,26.775-586.13,26.771-586.439,26.771Z"
                                                transform="translate(-193.003 -108.205)" />
                                            <path id="Path_547" data-name="Path 547"
                                                d="M-586.439,71.771c-.3,0-.606,0-.909,0a.574.574,0,0,1-.607-.566.571.571,0,0,1,.6-.572q.918,0,1.836,0a.57.57,0,0,1,.6.574.57.57,0,0,1-.591.562C-585.821,71.775-586.13,71.771-586.439,71.771Z"
                                                transform="translate(-193.003 -150.928)" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Invoice</span></span></a></span>
                    </li>
                    <li><a href="{{ route('customer.history') }}" class="collapsed"><span class="menu-bar__text">
                                <span class="sherah-menu-icon sherah-svg-icon__v1">
                                    <svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="19.527"
                                        height="19.582" viewBox="0 0 19.527 19.582">
                                        <g id="Icon" transform="translate(-115.401 35.25)">
                                            <path id="Path_1026" data-name="Path 1026"
                                                d="M133.432-15.668h-13.28c-.137-.024-.274-.048-.412-.071a5.177,5.177,0,0,1-4.285-4.372,5.176,5.176,0,0,1,2.84-5.353,5.455,5.455,0,0,1,1.7-.5V-26.2q0-3.631,0-7.263a1.665,1.665,0,0,1,.776-1.489,4.105,4.105,0,0,1,.717-.295h9.185a5.733,5.733,0,0,1,.452.369c1.18,1.172,2.353,2.351,3.533,3.523a.846.846,0,0,1,.267.645q-.008,3.918,0,7.835c0,1.815,0,3.631,0,5.446a1.68,1.68,0,0,1-1.056,1.627A3.581,3.581,0,0,1,133.432-15.668ZM129.949-34.1h-8.134a.591.591,0,0,0-.669.669q0,3.633,0,7.265v.2a5.282,5.282,0,0,1,2.534,1.006.59.59,0,0,0,.326.107q3.75.009,7.5,0c.064,0,.128,0,.191,0a.579.579,0,0,1,.546.541.579.579,0,0,1-.484.6,1.439,1.439,0,0,1-.229.008h-6.663a5.29,5.29,0,0,1,.841,2.295h.32q2.784,0,5.567,0a.591.591,0,0,1,.6.353.574.574,0,0,1-.583.8q-2.841,0-5.682,0h-.223a5.257,5.257,0,0,1-1.884,3.442h9.254c.485,0,.7-.213.7-.7q0-6.271,0-12.542v-.22H130.6a.585.585,0,0,1-.654-.646c0-.452,0-.9,0-1.357Zm-5.358,13.269a4.023,4.023,0,0,0-4.016-4.013,4.023,4.023,0,0,0-4.021,4.008,4.024,4.024,0,0,0,4.025,4.023A4.024,4.024,0,0,0,124.591-20.834Zm8.268-10.6-1.747-1.748v1.748Z"
                                                transform="translate(0 0)" />
                                            <path id="Path_1027" data-name="Path 1027"
                                                d="M262.772,101.242q2.084,0,4.168,0a.572.572,0,0,1,.572.789.554.554,0,0,1-.539.357c-.376,0-.752,0-1.128,0h-7.151a1.177,1.177,0,0,1-.247-.014.572.572,0,0,1,.138-1.132q1.941,0,3.881,0Z"
                                                transform="translate(-135.313 -129.532)" />
                                            <path id="Path_1028" data-name="Path 1028"
                                                d="M206.635,193.557c.317,0,.609,0,.9,0a.576.576,0,1,1,0,1.147q-.708,0-1.415,0a.58.58,0,0,1-.631-.63q0-1.09,0-2.181a.576.576,0,1,1,1.147-.006C206.636,192.435,206.635,192.983,206.635,193.557Z"
                                                transform="translate(-85.488 -214.962)" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">History</span></span></a></span>
                    </li>
                    <li><a href="{{ route('customer.chat.message') }}" class="collapsed"><span
                                class="menu-bar__text">
                                <span class="sherah-menu-icon sherah-svg-icon__v1">
                                    <svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="22.029"
                                        height="22.368" viewBox="0 0 22.029 22.368">
                                        <g id="Icon" transform="translate(-336.061 -361.698)">
                                            <path id="Path_230" data-name="Path 230"
                                                d="M336.063,371.173q0-3.247,0-6.494a2.764,2.764,0,0,1,2.976-2.979q5.978,0,11.955,0a2.76,2.76,0,0,1,2.962,2.95q.006,3.935,0,7.87a2.759,2.759,0,0,1-2.968,2.944c-3.154,0-6.307,0-9.461.012a1.181,1.181,0,0,0-.685.246c-1.16.936-2.3,1.9-3.444,2.851-.272.227-.543.44-.925.263-.4-.185-.414-.538-.413-.911Q336.067,374.549,336.063,371.173Zm1.378,5.571c.986-.82,1.884-1.554,2.766-2.307a1.4,1.4,0,0,1,.976-.355q4.881.015,9.763.005a1.423,1.423,0,0,0,1.633-1.629q0-3.849,0-7.7c0-1.175-.5-1.681-1.668-1.681H339.126c-1.177,0-1.685.5-1.685,1.664q0,5.742,0,11.484Z"
                                                transform="translate(0 0)" />
                                            <path id="Path_231" data-name="Path 231"
                                                d="M415,440.162v-8.715c0-.932,0-1.864,0-2.8a1.38,1.38,0,0,0-1.328-1.5c-.48-.059-.753-.333-.729-.732.025-.417.352-.664.852-.642a2.731,2.731,0,0,1,2.578,2.721c.019,2.251.007,4.5.007,6.752,0,2.036,0,4.071,0,6.107,0,.364-.043.692-.419.864s-.63-.024-.9-.237c-.917-.736-1.828-1.478-2.761-2.193a1.225,1.225,0,0,0-.687-.245c-2.924-.016-5.85-.044-8.773,0A2.889,2.889,0,0,1,399.878,436a.63.63,0,0,1,.678-.59.64.64,0,0,1,.672.6,4.747,4.747,0,0,1,.014.644,1.385,1.385,0,0,0,1.5,1.5c3.025,0,6.05.01,9.075-.007a1.732,1.732,0,0,1,1.211.43C413.65,439.1,414.3,439.6,415,440.162Z"
                                                transform="translate(-58.296 -58.218)" />
                                            <path id="Path_232" data-name="Path 232"
                                                d="M388.91,411.084c-1.3,0-2.6,0-3.906,0-.546,0-.855-.252-.859-.682s.306-.693.847-.694q3.971,0,7.941,0c.534,0,.848.271.838.7-.009.416-.313.671-.826.672C391.6,411.086,390.255,411.084,388.91,411.084Z"
                                                transform="translate(-43.947 -43.807)" />
                                            <path id="Path_233" data-name="Path 233"
                                                d="M387.582,443.079c-.872,0-1.744,0-2.616,0-.511,0-.814-.259-.822-.675-.008-.432.3-.7.84-.7q2.595,0,5.19,0c.538,0,.849.264.844.7s-.315.677-.861.679C389.3,443.082,388.44,443.079,387.582,443.079Z"
                                                transform="translate(-43.946 -73.004)" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-bar__name">Message</span></span></a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
