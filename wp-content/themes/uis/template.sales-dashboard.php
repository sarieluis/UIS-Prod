<?php
/*
 Template Name: Sales Dashboard
*/

global $post;
get_header();

use Inmanage\SalesForce\SalesForceReports\SalesForceReport;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;

$check = new SalesForceQueryResponse( SalesForceQuery::get_reports() );
//echo "<pre style='direction:ltr; text-align: left'>";
//var_dump($check);
//echo "</pre>";
//die;
?>

<section id="reports-table">

  <!-- Table -->
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Sum</th>
        <th>Goal</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th>Name</th>
        <th>Sum</th>
        <th>Goal</th>
      </tr>
    </tfoot>
  </table>
  <!-- End Table -->

</section>

<?php get_footer(); ?>
