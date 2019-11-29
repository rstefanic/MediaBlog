@extends('layouts.app')

@section('title', 'Support Us')

@section('content')
    <div class="container py-4 donation-info">
        <div>
          <h1>Donate</h1>
          <h3>Your contributions help us pay for the site and authors.</h3>
          <p>We love to bring you quality articles, and we would love to keep the conversation going in a clean, ad free environment. Unfortuantely, server costs aren't free. This site is a passion project, and we would love to ensure that the passion doesn't become a chore and burden in order for us to keep it up and running. If you enjoy the content on this site, please consider making a donation in order to keep the servers running. Your contribution is greatly appreicated.</p>
          <p>All donations are through PayPal and are directly used to pay for the upkeep of the server and article authors.</p>
        </div>

        <div class="row d-flex justify-content-around mt-5">
            <div>
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <p>One Time Donation</p>
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="L7883A59C4EEC" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
              </form>
            </div>

            <div>
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="U2M2TA768J9SY">
                <table>
                <tr><td><input type="hidden" name="on0" value="Donation Subscription">Donation Subscription</td></tr><tr><td><select name="os0">
                  <option value="Minor Subscription">Minor Subscription : $3.00 USD - monthly</option>
                  <option value="Major Subscription">Major Subscription : $8.00 USD - monthly</option>
                </select> </td></tr>
                </table>
                <input type="hidden" name="currency_code" value="USD">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
              </form>
            </div>
        </div>

    </div>
@endsection
