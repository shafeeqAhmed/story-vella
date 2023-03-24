<x-home-layout>
        <!-- banner-section -->
        <div class="banner_sec">
            <div class="container">
                <div class="banner_content">
                    <h1>Tell Something interesting!</h1>
                </div>
            </div>
        </div>
        <!-- section_2 -->
        <div class="marketing_sec">
            <div class="container">
                <div class="row">
                   <div class="col-lg-4">
                    <select name="category" id="category">
                        <option value="dave">Category</option>
                      <option value="category">Dave</option>
                      <option value="pumpernickel">Pumpernickel</option>
                      <option value="reeses">Reeses</option>
                    </select>
                   </div>
                   <div class="col-lg-4">
                    <select name="category" id="Location">
                        <option value="dave">Location</option>
                      <option value="category">Dave</option>
                      <option value="pumpernickel">Pumpernickel</option>
                      <option value="reeses">Reeses</option>
                    </select>
                   </div>
                   <div class="col-lg-4">
                    <button><a href="#">Search</a></button>
                   </div>
                   <div class="col-lg-12 col_1 d-flex align-items-center justify-content-between">
                    <div class="card d-flex align-items-center justify-content-between">
                        <div class="col_lg-6">
                            <div class="left_img">
                                <img src="{{ asset('custom/assets/img/bg.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right_content position-absolute ">
                                <h3>Digital Marekting Tutorial</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Maxime mollitia,
                                    molestiae quas vel sint commodi repudiandae
                                    consequuntur voluptatum laborum
                                    numquam blanditiis harum quisquam eius sed odit fugiat
                                    </p>
                                    <button><a href="#">Marekting</a></button>
                                    <i class="fa fa-pen"></i>
                                    <span>Jhon Deo</span>
                                    <i class="fa fa-heart"></i>
                                    <em>15 Likes</em>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </div>

</x-home-layout>
