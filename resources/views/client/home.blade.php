@extends('layouts.client')

@section('content')
<div id="home">
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height"><img src="{{ asset('client/images/nick-karvounis-78711.jpg')}}" alt="img" />
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Dec 31,2017
                            </a></div>
                        <div class=""><a href="single.html" class="fh5co_good_font"> After all is said and done, more is said than done </a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('client/images/science-578x362.jpg')}}" alt="img" />
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Oct
                                        28,2017 </a></div>
                                <div class=""><a href="single.html" class="fh5co_good_font_2"> After all is said and done, <br>more is said than done </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('client/images/joe-gardner-75333.jpg')}}" alt="img" />
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Oct 28,2017 </a></div>
                                <div class=""><a href="single.html" class="fh5co_good_font_2"> After all is said and done... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('client/images/ryan-moreno-98837.jpg')}}" alt="img" />
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Oct
                                        28,2017 </a></div>
                                <div class=""><a href="single.html" class="fh5co_good_font_2"> After all is said and done, more is said than done </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('client/images/10-1-1-875x500.jpg')}}" alt="img" />
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Oct
                                        28,2017 </a></div>
                                <div class=""><a href="single.html" class="fh5co_good_font_2"> After all is said and done, more is said... </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                <div class="item px-2" v-for="item in arrArticlesTrending">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img"><img :src="item.__link_image" :alt="item.title" :title="item.title" class="fh5co_img_special_relative" /></div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a :href="item.__link_deatail" class="text-white"> @{{ item.title }} </a>
                            <div class="fh5co_latest_trading_date_and_name_color"> @{{ item.__user_name }} - March 7,2017</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                <!-- <div class="item px-2" v-for="item in arrArticlesHotNew">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img :src="item.__link_image" :alt="item.slug" :title="item.title" /></div>
                        <div>
                            <a :href="item.__link_deatail" class="d-block fh5co_small_post_heading"><span class=""> @{{item.title}} </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div> -->
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{ asset('client/images/joe-gardner-75333.jpg')}}" alt="" /></div>
                        <div>
                            <a href="single.html" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{ asset('client/images/joe-gardner-75333.jpg')}}" alt="" /></div>
                        <div>
                            <a href="single.html" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{ asset('client/images/ryan-moreno-98837.jpg')}}" alt="" /></div>
                        <div>
                            <a href="single.html" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="{{ asset('client/images/seth-doyle-133175.jpg')}}" alt="" /></div>
                        <div>
                            <a href="single.html" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                    <img src="{{ asset('client/images/ariel-lustre-208615.jpg')}}" alt="" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" id="play-video">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">The top 10 funniest videos on YouTube </span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_2" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                    <img src="{{ asset('client/images/39-324x235.jpg')}}" alt="" /></div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2" id="play-video_2">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">The top 10 embedded YouTube videos this month</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_3" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_3">
                                    <img src="{{ asset('client/images/joe-gardner-75333.jpg')}}" alt="" /></div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_3" id="play-video_3">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">The top 10 best computer speakers in the market</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_4" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_4">
                                    <img src="{{ asset('client/images/vil-son-35490.jpg')}}" alt="" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_4" id="play-video_4">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">The top 10 best computer speakers in the market</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    <div class="row pb-4" v-for="item in arrArticlesHotNew">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img :src="item.__link_image" :alt="item.slug" :title="item.title" /></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <a :href="item.__link_deatail" class="fh5co_magna py-2"> @{{ toUpperCaseString(item.title) }} </a>
                            <a :href="item.__link_deatail" class="fh5co_mini_time py-3"> @{{ toUpperCaseString(item.__user_name) }} -
                                April 18,2016 </a>
                            <div class="fh5co_consectetur"> @{{ toUpperCaseString(item.description) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <a href="#" class="fh5co_tagg">Business</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Sport</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                        <a href="#" class="fh5co_tagg">Photography</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Education</a>
                        <a href="#" class="fh5co_tagg">Social</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    <div class="row pb-3" v-for="item in arrArticlesMostPopular">
                        <div class="col-5 align-self-center">
                            <img :src="item.__link_image" :alt="item.slug" :title="item.title" class="fh5co_most_trading" />
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"><a :href="item.__link_deatail">@{{ toUpperCaseString(item.title) }} </a></div>
                            <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                <div class="col-12 text-center pb-4 pt-4">
                    <paginate 
                        v-model="currentPage" 
                        :click-handler="getArticlesHotNew" 
                        :page-count="responseData.last_page" 
                        :prev-text="'Previous'" 
                        :next-text="'Next'" 
                        :container-class="'pagination'" 
                        :page-link-class="'btn_mange_pagging'" 
                        :prev-link-class="'btn_mange_pagging'" 
                        :next-link-class="'btn_mange_pagging'">
                    </paginate>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ mix('js/home.js') }}"></script>
@endsection