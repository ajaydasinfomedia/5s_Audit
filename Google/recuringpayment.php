<?xml version="1.0" encoding="UTF-8" ?>
<checkout-shopping-cart xmlns="http://checkout.google.com/schema/2">
  <shopping-cart>
    <items>
      <item>
        <item-name>Subscription to My Awesome Site</item-name>
        <item-description>Twelve Months of Access to My Awesome Site</item-description>
        <unit-price currency="USD">0.00</unit-price>
        <quantity>1</quantity>
        <merchant-private-item-data>
         ABCDEFGHIJKLMNOPQRSTUVWXYZ
        </merchant-private-item-data>
        <subscription type="google" period ="MONTHLY">
          <payments>
            <subscription-payment times=12>
              <maximum-charge currency="USD">12.00</maximum-charge>
            </subscription-payment>
          </payments>
          <recurrent-item>
            <item-name>Usage of My Awesome Website for One Month</item-name>
            <item-description>Your flat charge for accessing my website</item-description>
            <quantity>1</quantity>
            <unit-price currency="USD">12.00</unit-price>
            <digital-content>
              <display-disposition>OPTIMISTIC</display-disposition>
              <url>http://mywebsite.example.com</url>
              <description>Head over to the website linked below for pie!</description>
            </digital-content>
          </recurrent-item>
        </subscription>
        <digital-content>
          <display-disposition>OPTIMISTIC</display-disposition>
          <description>Congratulations! Your subscription is being set up. Feel free to log onto &amp;lt;a href='http://mywebsite.example.com'&amp;gt;mywebsite.example.com&amp;lt;/a&amp;gt; and try it out!</description>
        </digital-content>
      </item>
      <item>
        <item-name>Decoder Ring</item-name>
        <item-description>One-time charge for the decoder ring you (coincidentally) also ordered from me.</item-description>
        <unit-price currency="USD">5.00</unit-price>
        <quantity>1</quantity>
      </item>
    </items>
  </shopping-cart>
</checkout-shopping-cart>