<template>
  <div class="wrapper">
    <div
      class="page-header header-filter"
      style="
        background-image: url('../assets/img/profile_city.jpg');
        background-size: cover;
        background-position: top center;
      "
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <form class="form" method="" action="">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Login</h4>
                  <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
                <p class="description text-center">Or Be Classical</p>
                <div class="card-body">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="First Name..."
                    />
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Email..."
                    />
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Password..."
                    />
                  </div>
                </div>
                <div class="footer text-center">
                  <a
                    href="#pablo"
                    class="btn btn-primary btn-link btn-wd btn-lg"
                    >Get Started</a
                  >
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://www.creative-tim.com/"> Creative Tim </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/presentation"> About Us </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/blog"> Blog </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license"> Licenses </a>
            </li>
          </ul>
        </nav>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  bodyClass: "login-page",
  data() {
    return {
      firstname: null,
      email: null,
      password: null,
    };
  },
  props: {
    header: {
      type: String,
      default: require("../../assets/img/profile_city.jpg"),
    },
  },
  computed: {
    headerStyle() {
      return {
        backgroundImage: `url(${this.header})`,
      };
    },
  },
};
</script>

<style ></style>
