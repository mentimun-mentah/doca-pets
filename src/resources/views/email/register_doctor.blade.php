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
                    <svg id="Capa_1" enable-background="new 0 0 426.703 426.703" height="112" viewBox="0 0 426.703 426.703" width="112" xmlns="http://www.w3.org/2000/svg"><g><path d="m426.703 178.06v247.842h-426.615l155.216-135.479-155.304-112.363 213.352-177.259z" fill="#eab54e"/><path d="m39.09 42.67h346.296v268.823h-346.296z" fill="#eeefee"/><g fill="#dbd8dd"><path d="m66.54 69.985h148.576v9.039h-148.576z"/><path d="m66.54 115.231h182.801v9.039h-182.801z"/><path d="m278.679 115.231h79.263v9.039h-79.263z"/><path d="m66.54 160.472h68.793v9.039h-68.793z"/><path d="m156.002 160.472h201.94v9.039h-201.94z"/><path d="m66.54 205.718h144.132v9.039h-144.132z"/><path d="m236.674 205.718h121.267v9.039h-121.267z"/><path d="m357.941 250.964v9.039h-291.401v-9.039"/></g><path d="m271.399 290.423 155.216 135.479h.088v-247.842z" fill="#f6c863"/><path d="m155.304 290.423-155.216 135.479h-.088v-247.842z" fill="#f6c863"/><path d="m426.615 425.902h-426.527l155.216-135.479h116.095z" fill="#eab54e"/></g></svg>

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
                      Terima kasih telah mendaftar sebagai dokter pada sistem Doca.Pets.
                      Admin kami akan memvalidasi data-data kamu, silahkan tunggu untuk email selanjutnya untuk mengetahui apakah kamu diterima atau tidak.
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
              © 2021 All Rights Reserved by Doca.Pets.
              <br /><br />
            </p>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
  <!-- partial -->
</html>
