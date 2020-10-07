{{--
  Title: Mieszkania
  Description: Taby
  Category: formatting
  Icon: admin-comments
  Keywords: Mieszkania
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: center
  SupportsMode: false
  SupportsMultiple: false
--}}

<section class="l-flats">
  <div class="l-container">
    <div class="c-heading">
      <p class="c-heading__sub">{{ get_field('flat-list-sub') }}</p>
      <h2 class="c-heading__title"> {{ get_field('flat-list-title') }} </h2>
    </div>
    <div class="c-tabs">
      <nav class="c-tabs__menu" data-tab-menu>
        <button data-open-tab-name="{{ get_field('flat-list-hash-1') }}">{{ get_field('flat-list-btn-1') }}</button>
        <button data-open-tab-name="{{ get_field('flat-list-hash-2') }}">{{ get_field('flat-list-btn-2') }}</button>
      </nav>
      <div class="c-tabs__wrapper" data-tab-wrapper>
        <div class="c-tab" data-tab-name="{{ get_field('flat-list-hash-1') }}">
          <table class="c-table">
            <thead>
              <tr>
                <th>Lp.</th>
                <th>Powierzchnia</th>
                <th>Taras / Ogródek</th>
                <th>Pokoje</th>
                <th>Piętro</th>
                <th>Plan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @query([
              'post_type' => 'mieszkanie',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'orderby'=>'menu_order',
              'order' => 'ASC'
              ])
              @posts
              @php
              $id = get_the_ID();
              @endphp
              <tr>
                <td><a target="_blank" href="{{ $pdf['url'] }}">{{ get_the_title() }}</a></td>
                <td><a target="_blank" href="{{ $pdf['url'] }}">{{ get_field('flat-size', $id) }}m<sup>2</sup>@if(get_field('flat-antresola', $id)) {{ __('antresola','apart') }} @endif</a></td>
                <td>
                  <a target="_blank" href="{{ $pdf['url'] }}">
                    @php
                    $others = get_field('flat-others-size', $id);
                    if($others) {
                    echo $others . 'm<sup>2</sup>';
                    } else {
                    echo '-';
                    }
                    @endphp
                  </a>
                </td>
                <td><a target="_blank" href="{{ $pdf['url'] }}">{{ get_field('flat-rooms', $id) }}</a></td>
                <td><a target="_blank" href="{{ $pdf['url'] }}">{{ get_field('flat-floor', $id) }}</a></td>
                <td>
                  @php
                  $pdf = get_field('flat-pdf', $id);
                  @endphp
                  <a target="_blank" href="{{ $pdf['url'] }}">
                    <i class="c-icon c-icon--pdf"></i>
                  </a>
                </td>
                <td>
                  <a target="_blank" href="{{ $pdf['url'] }}">
                    @if(get_field('flat-status', $id))
                    <p style="color: red">{{ __('Sprzedane','apart') }}</p>
                    @else
                    <p style="color: green">{{ __('Dostępne','apart') }}</p>
                    @endif
                  </a>
                </td>
              </tr>
              @endposts
            </tbody>
          </table>
        </div>
        <div class="c-tab" data-tab-name="{{ get_field('flat-list-hash-2') }}">
          <form class="c-flat-form" action="">
            @query([
            'post_type' => 'buildings',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby'=>'menu_order',
            'order' => 'ASC'
            ])
            <div class="c-select">
              <select name="building" id="building">
                <option value="" disabled selected>Wybierz budynek</option>
                @posts
                <option value="{{ get_the_ID() }}">@title</option>
                @endposts
              </select>
            </div>
            <div class="c-select">
              <select name="floor" id="floor" disabled>
                <option value="" disabled selected>Wybierz piętro</option>
              </select>
            </div>
          </form>
          <div class="l-flats-floors">
            <div class="loader3" id="floors-loader"><span></span><span></span></div>
            <div id="floors-wrapper">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
