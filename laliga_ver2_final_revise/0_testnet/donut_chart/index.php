<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<meta charset=utf-8 />
<title>Morris.js Donut Chart Example</title>
</head>
<body>
 <div id="area-example" style="height: 250px;"></div>






<script type="text/javascript">
  /*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Area({
  element: 'area-example',
  data: [
    { y: '2006', a: 100, b: 90, c: 23 },
    { y: '2007', a: 75,  b: 65, c: 23 },
    { y: '2008', a: 50,  b: 40, c: 23},
    { y: '2009', a: 75,  b: 65, c: 23},
    { y: '2010', a: 50,  b: 40, c: 23},
    { y: '2011', a: 75,  b: 65, c: 23},
    { y: '2012', a: 100, b: 90, c: 23}
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['Series A', 'Series B', 'Series C']
});

</script>

</body>
</html>
