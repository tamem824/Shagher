<x-guest.layouts.app :categories="$categories">
    <div class="popular-category-wrapper float_left">
        <div class="container">
            <div class="home1-section-heading1">
                <h6>Professional By Category</h6>
                <h4>Popular Categories</h4>
            </div>
            <div class="popular-category-main-box float_left">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="category-box float_left">
                                <span><i class="{{ $category->image }}" aria-hidden="true"></i></span>
                                <h4>{{ $category->name }}</h4>
                                <div class="category-overlay float_left">
                                    <h5>{{ $category->name }}</h5>
                                    <p>{{ $category->description }}</p>
                                    <a href="{{route('guest.categories.show',$category->id)}}">Explore <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-guest.layouts.app>
