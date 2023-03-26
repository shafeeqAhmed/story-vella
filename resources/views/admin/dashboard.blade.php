<x-dashboard-layout>
    <div id="root">
        <div class="container pt-5">
          <div class="row align-items-stretch">
            <div class="c-dashboardInfo col-lg-4 col-md-6">
                <a href="{{ route('stories.list')}}">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Stories<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"> {{ $totalStories }}</span>
                </div>
            </a>
              </div>
              <div class="c-dashboardInfo col-lg-4 col-md-6">
                <a href="{{ route('stories.list', ['type' => 'yes'])}}">

                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Published Stories<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">{{ $published }}</span>
                </div>
                </a>
              </div>
              <div class="c-dashboardInfo col-lg-4 col-md-6">
                <a href="{{ route('stories.list', ['type' => 'no'])}}">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Un Published Stories<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                        {{ $unPublished}}
                    </span>
                </div>
                </a>
              </div>
              <div class="c-dashboardInfo col-lg-4 col-md-6">
                <a href="{{ route('admin.users')}}">

                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Users<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                        {{ $users }}
                    </span>
                </div>
                </a>
                </div>



            <div class="c-dashboardInfo col-lg-4 col-md-6">
                <a href="{{ route('admin.users', ['type' => 'writer'])}}">

                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Writer<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                        {{ $writers }}
                    </span>

                </div>
                </a>
            </div>

            <div class="c-dashboardInfo col-lg-4 col-md-6">
                <a href="{{ route('admin.users', ['type' => 'reader'])}}">

              <div class="wrap">
                <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Reader<svg
                    class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                      d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                    </path>
                  </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                    {{ $readers }}
                  </span>
              </div>
                </a>
            </div>

          </div>
        </div>
      </div>
</x-dashboard-layout>

<style>
    .c-dashboardInfo {
  margin-bottom: 15px;
}
.c-dashboardInfo .wrap {
  background: #ffffff;
  box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
  border-radius: 7px;
  text-align: center;
  position: relative;
  overflow: hidden;
  padding: 40px 25px 20px;
  height: 100%;
}
.c-dashboardInfo__title,
.c-dashboardInfo__subInfo {
  color: #6c6c6c;
  font-size: 1.18em;
}
.c-dashboardInfo span {
  display: block;
}
.c-dashboardInfo__count {
  font-weight: 600;
  font-size: 2.5em;
  line-height: 64px;
  color: #323c43;
}
.c-dashboardInfo .wrap:after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 10px;
  content: "";
}

.c-dashboardInfo:nth-child(1) .wrap:after {
  background: linear-gradient(82.59deg, #00c48c 0%, #00a173 100%);
}
.c-dashboardInfo:nth-child(2) .wrap:after {
  background: linear-gradient(81.67deg, #0084f4 0%, #1a4da2 100%);
}
.c-dashboardInfo:nth-child(3) .wrap:after {
  background: linear-gradient(69.83deg, #0084f4 0%, #00c48c 100%);
}
.c-dashboardInfo:nth-child(4) .wrap:after {
  background: linear-gradient(81.67deg, #ff647c 0%, #1f5dc5 100%);
}
.c-dashboardInfo__title svg {
  color: #d7d7d7;
  margin-left: 5px;
}
.MuiSvgIcon-root-19 {
  fill: currentColor;
  width: 1em;
  height: 1em;
  display: inline-block;
  font-size: 24px;
  transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  user-select: none;
  flex-shrink: 0;
}
a {
    text-decoration: none;
}
</style>
