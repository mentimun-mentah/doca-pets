<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Confirmation Email</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
      body {
        margin: 0;
        background: #fefefe;
        color: #585858;
      }

      table {
        font-size: 15px;
        line-height: 23px;
        text-align: center;
      }
      .table_inner {
        min-width: 100% !important;
      }
      td {
        font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
        vertical-align: top;
      }

      .carpool_logo {
        margin: 30px auto;
      }

      .dummy_row {
        padding-top: 20px !important;
      }
      .section,
      .sectionlike {
        background: #c9f9e9;
      }
      .section {
        padding: 0 20px;
      }
      .sectionlike {
        padding-bottom: 10px;
      }
      .section_content {
        width: 100%;
        background: #fff;
      }
      .section_content_padded {
        padding: 0 35px 40px;
      }
      .section_zag {
        background: #f4fbf9;
      }
      .imageless_section {
        padding-bottom: 20px;
      }

      .img_section {
        width: 100%;
        max-width: 500px;
      }
      .img_section_side_table {
        width: 100% !important;
      }

      h1 {
        font-size: 20px;
        font-weight: 500;
        margin-top: 40px;
        margin-bottom: 0;
      }
      .near_title {
        margin-top: 10px;
      }
      .last {
        margin-bottom: 0;
      }

      a {
        color: #199eff;
        font-weight: 500;
        word-break: break-word; /* Footer has long unsubscribe link */
      }

      .button {
        display: block;
        width: 100%;
        max-width: 300px;
        background: #20da9c;
        border-radius: 8px;
        color: #fff;
        font-size: 18px;
        font-weight: normal; /* Resetting from a */
        padding: 12px 0;
        margin: 30px auto 0;
        text-decoration: none;
      }

      small {
        display: block;
        width: 100%;
        font-size: 14px;
        margin-top: 30px;
      }
      .signature {
        padding: 20px;
      }

      .footer,
      .footer_like {
        background: #1fd99a;
      }
      .footer {
        padding: 0 20px 30px;
      }
      .footer_content {
        width: 100%;
        text-align: center;
        font-size: 12px;
        line-height: initial;
        color: #005750;
      }
      .footer_content a {
        color: #005750;
      }
      .footer_item_image {
        margin: 0 auto 10px;
      }
      .footer_item_caption {
        margin: 0 auto;
      }

      .footer_legal {
        padding: 20px 0 40px;
        margin: 0;
        font-size: 12px;
        color: #a5a5a5;
        line-height: 1.5;
      }

      .text_left {
        text-align: left;
      }
      .text_right {
        text-align: right;
      }
      .va {
        vertical-align: middle;
      }

      .stats {
        min-width: auto !important;
        max-width: 370px;
        margin: 30px auto 0;
      }
      .counter {
        font-size: 22px;
      }
      .stats_counter {
        width: 23%;
      }
      .stats_image {
        width: 18%;
        padding: 0 10px;
      }
      .stats_meta {
        width: 59%;
      }
      .stats_spaced {
        padding-top: 16px;
      }
      .walkthrough_spaced {
        padding-top: 24px;
      }

      .walkthrough {
        max-width: none;
      }
      .walkthrough_meta {
        padding-left: 20px;
      }

      .table_checkmark {
        padding-top: 30px;
      }
      .table_checkmark_item {
        font-size: 15px;
      }
      .td_checkmark {
        width: 24px;
        padding: 7px 12px 0 0;
      }

      .padded_bottom {
        padding-bottom: 40px;
      }
      .marginless {
        margin: 0;
      }

      /* Restricting responsive for iOS Mail app only as Inbox/Gmail have render bugs */
      @media only screen and (max-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        table {
          min-width: auto !important;
        }

        .section_content_padded {
          padding-right: 25px !important;
          padding-left: 25px !important;
        }

        .counter {
          font-size: 18px !important;
        }
      }

      .outside-color {
        background: #e0e0e0 !important;
      }
      .border-top-radius {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }
      .border-bottom-radius {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
      }
      .border-top-radius2 {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
      }
      .border-bottom-radius2 {
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
      }
    </style>
  </head>
  <!-- partial:index.partial.html -->
  <body style="margin: 0; background: #fefefe !important; color: #585858">
    <!-- Preivew text -->
    <table
      align="center"
      border="0"
      cellspacing="0"
      cellpadding="0"
      style="
        font-size: 15px;
        line-height: 23px;
        max-width: 650px;
        min-width: 460px;
        text-align: center;
        margin-top: 20px;
      "
    >
      <tbody>
        <!-- Header -->
        <tr>
          <td
            class="sectionlike imageless_section outside-color border-top-radius"
            style="
              font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
              vertical-align: top;
              border: none !important;
              padding-bottom: 10px;
              padding-bottom: 20px;
            "
          ></td>
        </tr>
        <!-- Content -->
        <tr>
          <td
            class="section outside-color"
            style="
              font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
              vertical-align: top;
              border: none !important;
              padding: 0 10px;
            "
          >
            <table
              border="0"
              cellspacing="0"
              cellpadding="0"
              class="section_content border-top-radius2"
              style="
                font-size: 15px;
                line-height: 23px;
                max-width: 650px;
                min-width: 460px;
                text-align: center;
                width: 100%;
                background: #fff;
              "
            >
              <tbody>
                <tr>
                  <td>
                    <div style="margin-top: 30px;"></div>
                    <svg id="Layer_1" height="112" viewBox="0 0 512 512" width="112" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m242.04 420.877a43.6 43.6 0 0 0 -23.24-30.33l-50.97-21.76v-1.331a90.774 90.774 0 0 1 -76.89 0v1.331l-50.97 21.76a43.613 43.613 0 0 0 -23.97 35.4v55.42h226.77v-55.42a40.427 40.427 0 0 0 -.73-5.07z" fill="#50a6ea"/><path d="m69.97 390.547 39.347-16.8a90.624 90.624 0 0 1 -18.377-6.292v1.331l-50.97 21.76a43.613 43.613 0 0 0 -23.97 35.401v55.42h30v-55.42a43.613 43.613 0 0 1 23.97-35.4z" fill="#72bcef"/><path d="m476 49.047h-269.96a20 20 0 0 0 -20 20v56.63a82.608 82.608 0 0 1 22.76 57.04v31.65h1.96a15.668 15.668 0 0 1 14.02 11.94 20.834 20.834 0 0 1 -16.61 25.48v10.28a80.886 80.886 0 0 1 -22.14 55.71l.01.01v58.78l32.76 13.98a43.6 43.6 0 0 1 23.24 30.33h233.96a19.994 19.994 0 0 0 20-20v-331.83a20 20 0 0 0 -20-20z" fill="#e5f5fd"/><circle cx="287.87" cy="171.917" fill="#49c160" r="60"/><path d="m247.87 171.916a60.017 60.017 0 0 1 50-59.154 60 60 0 1 0 0 118.309 60.008 60.008 0 0 1 -50-59.155z" fill="#5ae070"/><path d="m208.8 214.367v.92s-70.81 12.48-118.29-29.83a249.9 249.9 0 0 1 -29.32.74l-2.21 36.27a1.677 1.677 0 0 1 -2.44 1.36l-9.8-5.03a6.788 6.788 0 0 1 -3.66-5.55v-30.53a82.86 82.86 0 0 1 165.72 0z" fill="#4a5160"/><path d="m87.35 124.127a82.6 82.6 0 0 1 48.66-23.658 83.661 83.661 0 0 0 -10.07-.612 82.863 82.863 0 0 0 -82.86 82.86v30.53a6.788 6.788 0 0 0 3.66 5.55l9.8 5.03a1.678 1.678 0 0 0 2.44-1.36s-4.307-65.667 28.37-98.34z" fill="#58606d"/><path d="m167.83 332.247v35.21a90.781 90.781 0 0 1 -76.89 0v-32.59a81.284 81.284 0 0 0 76.89-2.62z" fill="#efc597"/><path d="m110.94 367.456v-25.767a80.7 80.7 0 0 1 -20-6.822v32.589a90.763 90.763 0 0 0 48.445 7.989 90.7 90.7 0 0 1 -28.445-7.989z" fill="#d8ad82"/><path d="m167.83 332.247a81.2 81.2 0 0 1 -122.08-70.18v-10.28a20.876 20.876 0 0 1 -16.62-25.48 15.68 15.68 0 0 1 14.03-11.94l.09-.02a6.772 6.772 0 0 0 3.49 4.45l9.8 5.03a1.677 1.677 0 0 0 2.44-1.36l2.21-36.27a249.9 249.9 0 0 0 29.32-.74c47.48 42.31 118.29 29.83 118.29 29.83v-.92h1.96a15.668 15.668 0 0 1 14.02 11.94 20.834 20.834 0 0 1 -16.61 25.48v10.28a80.886 80.886 0 0 1 -22.14 55.71c-.53.58-1.09 1.15-1.65 1.71a81.27 81.27 0 0 1 -16.55 12.76z" fill="#ffd8b7"/><path d="m110.94 334.867a81.206 81.206 0 0 1 -45.19-72.8v-10.28a20.876 20.876 0 0 1 -16.62-25.48 15.765 15.765 0 0 1 2.267-5.12l-4.657-2.387a6.772 6.772 0 0 1 -3.49-4.45l-.09.02a15.68 15.68 0 0 0 -14.03 11.94 20.838 20.838 0 0 0 16.62 25.48v10.28a81.17 81.17 0 0 0 81.21 81.21 82.043 82.043 0 0 0 9.984-.618 80.73 80.73 0 0 1 -26.004-7.795z" fill="#e8bc9e"/><g fill="#b9c8db"><path d="m446.584 233.686h-43.866a6 6 0 0 1 0-12h43.866a6 6 0 0 1 0 12z"/><path d="m376.872 233.686h-14.715a6 6 0 0 1 0-12h14.715a6 6 0 0 1 0 12z"/><path d="m446.584 298.582h-14.895a6 6 0 1 1 0-12h14.895a6 6 0 0 1 0 12z"/><path d="m410.937 298.582h-79.459a6 6 0 1 1 0-12h79.459a6 6 0 0 1 0 12z"/><path d="m310.437 298.582h-5.361a6 6 0 0 1 0-12h5.361a6 6 0 0 1 0 12z"/><path d="m279.23 298.582h-34.018a6 6 0 0 1 0-12h34.018a6 6 0 0 1 0 12z"/><path d="m446.584 358.563h-34.335a6 6 0 0 1 0-12h34.335a6 6 0 0 1 0 12z"/><path d="m390.714 358.563h-4.314a6 6 0 0 1 0-12h4.311a6 6 0 1 1 0 12z"/><path d="m369.514 358.563h-32.614a6 6 0 0 1 0-12h32.615a6 6 0 0 1 0 12z"/><path d="m310.437 358.563h-65.225a6 6 0 0 1 0-12h65.225a6 6 0 0 1 0 12z"/><path d="m446.584 182.6h-3.872a6 6 0 0 1 0-12h3.872a6 6 0 0 1 0 12z"/><path d="m416.867 182.6h-42.528a6 6 0 0 1 0-12h42.528a6 6 0 0 1 0 12z"/><path d="m446.584 132.6h-42.867a6 6 0 0 1 0-12h42.867a6 6 0 0 1 0 12z"/><path d="m377.872 132.6h-3.533a6 6 0 0 1 0-12h3.533a6 6 0 0 1 0 12z"/></g><path d="m274.511 199.836a6 6 0 0 1 -4.243-1.757l-17.1-17.105a6 6 0 1 1 8.485-8.484l12.862 12.861 39.585-39.589a6 6 0 0 1 8.485 8.485l-43.832 43.832a6 6 0 0 1 -4.242 1.757z" fill="#f4f8fc"/><path d="m255.45 30.637h181.14v34.38h-181.14z" fill="#475673"/></svg>
                  </td>
                </tr>
                <tr>
                  <td
                    class="section_content_padded"
                    style="
                      font-family: -apple-system, BlinkMacSystemFont, Roboto,
                        sans-serif;
                      vertical-align: top;
                      border: none !important;
                      padding: 0 35px 40px;
                    "
                  >
                    <h1
                      style="
                        font-size: 20px;
                        font-weight: 500;
                        margin-top: 20px;
                        margin-bottom: 0;
                      "
                    >
                      Halo {{$user->name}},
                    </h1>
                    <p
                      class="near_title last"
                      style="margin-top: 10px; margin-bottom: 0"
                    >
                      Selamat data anda telah disetujui oleh admin Doca.Pets, silahkan masuk dan lengkapi profil anda.
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Signature -->
        <tr>
          <td
            class="section outside-color"
            style="
              font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
              vertical-align: top;
              border: none !important;
              padding: 0 10px;
            "
          >
          </td>
        </tr>
        <!-- Footer -->
        <tr>
          <td
            class="section dummy_row outside-color border-bottom-radius"
            style="
              font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
              vertical-align: top;
              border: none !important;
              padding: 0 20px;
              padding-top: 20px !important;
            "
          />
        </tr>

        <!-- Legal footer -->
        <tr>
          <td
            style="
              font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
              vertical-align: top;
              border: none !important;
            "
          >
            <p
              class="footer_legal"
              style="
                padding: 20px 0 40px;
                margin: 0;
                font-size: 12px;
                color: #a5a5a5;
                line-height: 1.5;
              "
            >
              © 2020 All Rights Reserved by Doca.Pets.
              <br /><br />
            </p>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
  <!-- partial -->
</html>
