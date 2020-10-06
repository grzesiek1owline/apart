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
                <th>Taras/Ogródek</th>
                <th>Liczba pokoi</th>
                <th>Piętro</th>
                <th>Plan PDF</th>
                <th>Cena</th>
                <th>Status</th>
              </tr>
             </thead>
             <tbody>
              @query([
                'post_type' => 'mieszkanie',
                'posts_per_page' => -1,
                'post_status' => 'publish'
              ])
              @posts
              @php
                $id = get_the_ID();
              @endphp
              <tr>
                <td>{{ get_the_title() }}</td>
                <td>{{ get_field('flat-size', $id) }}</td>
                <td>
                  @php
                    $others = get_field('flat-others-size', $id);
                    if($others) {
                      echo $others;
                    } else {
                      echo '-';
                    }
                  @endphp
                </td>
                <td>{{ get_field('flat-rooms', $id) }}</td>
                <td>
                  @php
                    $term_obj_list = get_the_terms( $id, 'floor' );
                    echo $term_obj_list[0] -> name;
                  @endphp
                </td>
                <td>
                  @php
                    $pdf = get_field('flat-pdf', $id);
                  @endphp
                  <a href="{{ $pdf['url'] }}"><i class="c-icon c-icon--pdf"></i></a>
                </td>
                <td>{{ get_field('flat-price', $id) }}</td>
                <td>
                  @if(get_field('flat-status', $id))
                    <p style="color: red">Sprzedane</p>
                  @else
                    <p style="color: green">Dostępne</p>
                  @endif
                </td>
              </tr>
              @endposts
             </tbody>
          </table>
        </div>
        <div class="c-tab" data-tab-name="{{ get_field('flat-list-hash-2') }}">
ddd
        </div>
      </div>
    </div>
  </div>
</section>
