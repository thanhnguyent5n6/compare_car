<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class CarCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:CarCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $list_url = array(
            // //Honda
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-accord-562.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-city-1-5-top-2186.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-city-1-5at-561.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-civic-1-5-turbo-256.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-cr-v-1-5-e-2357.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-cr-v-1-5-g-2358.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-cr-v-1-5-l-2359.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-hr-v-g-2390.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-hr-v-l-2391.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-hr-v-l---------tr---ng-ng---c--2392.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-jazz-1-5v-2360.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-jazz-1-5rs-2362.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-jazz-1-5vx-2361.html',
            //     'hang'=>'Honda',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-odyssey-563.html',
            //     'hang'=>'Honda',
            // ],
            // // Kia
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-morning-1-25-si-at-340.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-morning-1-25-s-at-2341.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-morning-1-25-exmt-338.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-morning-1-0mt-337.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-cerato-koup-362.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-cerato-hatchback-1-6-363.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-cerato-2-0at-695.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-cerato-1-6mt-693.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-cerato-1-6at-694.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-optima-2-0at-364.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-optima-2-0ath-2084.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-optima-2-4-gt-line-2085.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-rio-hatchback-358.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-rio-sedan-1-4-at-360.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-rio-sedan-1-4-mt-359.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-rondo-1-7-dat-352.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-rondo-2-0-gat-350.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-rondo-2-0-gath-351.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-sedona-2-2-luxury-2401.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-sedona-2-2-platinum-d-2400.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-sedona-3-3-platinum-g-2399.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-sorento-dath-2wd-347.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-sorento-gat-2wd-346.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-sorento-gath-2wd-348.html',
            //     'hang'=>'Kia',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-soul--sunroof--366.html',
            //     'hang'=>'Kia',
            // ],
            // // Chevrolet
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-trax-2083.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-aveo-lt-302.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-aveo-ltz-303.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-captiva-revv-307.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-colorado-2-5-vgt-4x2-at-lt-2378.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-colorado-2-5-vgt-4x4-at-ltz-2376.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-colorado-2-5-vgt-4x4-mt-ltz-2377.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-colorado-lt-2-5-mt-4x2-312.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-colorado-lt-2-5-mt-4x4-311.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-cruze-lt-1-6-304.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-cruze-ltz-1-8-305.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-orlando-ltz-1-8-306.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/van-spark-duo-299.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-spark-ls-300.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-trailblazer-2-5l-4x2-at-lt-2380.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-trailblazer-2-5l-4x2-at-ltz-2381.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-trailblazer-2-5l-4x2-mt-lt-2379.html',
            //     'hang'=>'Chevrolet',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-optima-2-0ath-2084.html',
            //     'hang'=>'Chevrolet',
            // ],
            // //Ford
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-raptor-2402.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-ecosport-ambiente-1-5at-2356.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-ecosport-ambiente-1-5mt-2355.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-ecosport-titanium-1-0-ecoboost-2354.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-ecosport-titanium-1-5at-580.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-ecosport-trend-1-5at-579.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-everest-titanium-2-0-at-4wd-2387.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-everest-titanium-2-0-at-4x2-2388.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-everest-trend-2-0-at-4x2-2389.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-explorer-2090.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-fiesta-1-0-sport-574.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-fiesta-1-5-sport-573.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-fiesta-1-5-titanium-571.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-focus-1-5-sport-578.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-focus-1-5-titanium-576.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-focus-1-5-trend-2080.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-focus-1-5-trend-2081.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-xlt-2-2l---4x4-mt-589.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-wildtrak-2-2l---4x2-at--590.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-wildtrak-2-2l---4x4-at--2185.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-wildtrak-3-2l---4x4-at-592.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-xl-2-2l--4x4-mt-586.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-xls-2-2l---4x2-mt-587.html',
            //     'hang'=>'Ford',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-ranger-xlt-2-2l---4x4-mt-589.html',
            //     'hang'=>'Ford',
            // ],
            // //Huyndai
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--accent-1-4-at-282.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--accent-1-4-at------c-bi---t-2364.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--accent-1-4-mt-281.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--accent-1-4-mt-ti--u-chu---n-2363.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--elantra-1-6-at-288.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--elantra-1-6-mt-287.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--elantra-2-0-at-289.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--grand-i10-1-0-base-272.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan--grand-i10-1-2-sedan-at-279.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--grand-i10-hatchback-1-0-at-274.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--grand-i10-hatchback-1-0-mt-273.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--grand-i10-hatchback-1-2-at-277.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--grand-i10-hatchback-1-2-mt-276.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--grand-i10-hatchback-1-2mt-base-275.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--santafe-diesel-2wd-297.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--santafe-diesel-limited-4wd-298.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--santafe-gas-2wd-295.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--santafe-gas-limited-4wd-296.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--tucson-1-6t-2wd-2191.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--tucson-2-0-2wd--293.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--tucson-2-0-2wd-limited-294.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv--tucson-2-0-diesel-2192.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-grand-i10-1-2-sedan-mt-278.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-grand-i10-1-2-sedan-mt-base-2190.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-kona-1-6-turbo-2384.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-kona-2-0-at-ti--u-chu---n-2382.html',
            //     'hang'=>'Huyndai',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-kona-2-0-at------c-bi---t-2383.html',
            //     'hang'=>'Huyndai',
            // ],
            // // Infiniti
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-qx80-596.html',
            //     'hang'=>'Infiniti',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-qx70-595.html',
            //     'hang'=>'Infiniti',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-qx60-594.html',
            //     'hang'=>'Infiniti',
            // ],
            // //Isuzu
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-d-max-ls-4x4-mt-1857.html',
            //     'hang'=>'Isuzu',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-d-max-ls-4x4-at-1858.html',
            //     'hang'=>'Isuzu',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-d-max-ls-4x2-mt-1855.html',
            //     'hang'=>'Isuzu',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-d-max-ls-4x2-at-1856.html',
            //     'hang'=>'Isuzu',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-d-max-ls-3-0-4x4-at-1859.html',
            //     'hang'=>'Isuzu',
            // ],
            // //Lexus
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-rx350-330.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-es250-323.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-es350-324.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-gs200t-1872.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-gs350-325.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gx460-328.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-ls460l-326.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-lx570-331.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-nx200t-327.html',
            //     'hang'=>'Lexus',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-rx200t-329.html',
            //     'hang'=>'Lexus',
            // ],
            // //Mercedes
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-a200-614.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-a250-398.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-a45-amg-399.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-c200-400.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-c250-exclusive-401.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-c300-amg-2065.html',
            //     'hang'=>'Mercedes',
            // ],

            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-c300-coupe-402.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-4-c---a-cla200-403.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-4-c---a-cla250-404.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-4-c---a-cla250-4matic-2180.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-e200-616.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-e250-2181.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-e300-amg-617.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gla200-621.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gla250-4matic-622.html',
            //     'hang'=>'Mercedes',
            // ],

            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gla45-amg-4matic-623.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-glc250-4matic-656.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-glc300-4matic-657.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-coupe-glc300-4matic-coupe-2182.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gle400-4matic-626.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-coupe-gle400-4matic-coupe-624.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gls-350d-4matic-2067.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gls400-4matic-2068.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gls500-4matic-2069.html',
            //     'hang'=>'Mercedes',
            // ],

            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-gls63-amg-4-matic-2070.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-coupe-mercedes-amg-gle43-4matic-coupe-625.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mercedes-maybach-s400-4matic-2104.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mercedes-maybach-s500-2103.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mercedes-maybach-s600-627.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-s400l-628.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-s500-4matic-coupe-632.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/convertible-s500-cabriolet-1873.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-s500l-629.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/convertible-sl400-1878.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/convertible-slc43-amg-1877.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-v220d-avantgarde-2071.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-v250-advantgarde-2072.html',
            //     'hang'=>'Mercedes',
            // ],
            // [
            //     'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-vito-tourer-121-2073.html',
            //     'hang'=>'Mercedes',
            // ],
            //[
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-ghibli-1864.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-optima-2-0ath-2084.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-ghibli-s-q4-1866.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-quattroporte-1860.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-quattroporte-gts-1863.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-quattroporte-s-1861.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-quattroporte-s-q4-1862.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-levante-1867.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-levante-s-1868.html',
            //  'hang'=>'Maserati',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-bt-50-2-2at-2wd-669.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-bt-50-2-2mt-4wd-668.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-cx-5-2-0at-665.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-cx-5-2-5-at-awd-667.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-cx-5-2-5at-2wd-666.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--mazda2-hatchback-659.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mazda2-sedan-658.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--mazda3-1-5at-hb-660.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mazda3-1-5at-sd-661.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mazda3-2-0at-sd-662.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mazda6-2-0at-663.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mazda6-2-0at-premium-2082.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-mazda6-2-5at-premium-664.html',
            //  'hang'=>'Mazda',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-attrage-cvt-600.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-attrage-mt-601.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-mirage-cvt-379.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-mirage-cvt-eco-2336.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-mirage-mt-599.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-mirage-mt-eco-2337.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-outlander-2-0-cvt-2338.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-outlander-2-0-std-2076.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-outlander-2-4-cvt--2339.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-outlander-sport-cvt--604.html',
            //  'hang'=>'Mitsubishi',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-pajero-sport-4x2-m---i-2078.html',
            //  'hang'=>'Mitsubishi',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-pajero-3-0-609.html',
            //  'hang'=>'Mitsubishi',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-juke-566.html',
            //  'hang'=>'Nissan',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-navara-np300-vl-4x4-at-569.html',
            //  'hang'=>'Nissan',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-navara-np300e-4x2mt-567.html',
            //  'hang'=>'Nissan',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-navara-np300el-4x2at-2187.html',
            //  'hang'=>'Nissan',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/pick-up-navara-np300sl-4x4-mt-568.html',
            //  'hang'=>'Nissan',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-sunny-xl-264.html',
            //  'hang'=>'Nissan',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-sunny-xv-265.html',
            //  'hang'=>'Nissan',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-teana-2-5-sl-564.html',
            //  'hang'=>'Nissan',
            // ],





            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-x-trail-2-0-2wd-1869.html',
            //  'hang'=>'Nissan',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-x-trail-v-series-2-5-sv-4wd-1871.html',
            //  'hang'=>'Nissan',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback--208-1843.html',
            //  'hang'=>'Peugeot',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-3008-1846.html',
            //  'hang'=>'Peugeot',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-408-1847.html',
            //  'hang'=>'Peugeot',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-508-sedan-1848.html',
            //  'hang'=>'Peugeot',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/roadster-718-boxster-444.html',
            //  'hang'=>'Porsche',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/roadster-718-boxster-s-445.html',
            //  'hang'=>'Porsche',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-718-cayman-447.html',
            //  'hang'=>'Porsche',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-718-cayman-s-448.html',
            //  'hang'=>'Porsche',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe--911-carrera-428.html',
            //  'hang'=>'Porsche',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-911-carrera-4-432.html',
            //  'hang'=>'Porsche',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/roadster-911-carrera-4-cabriolet-434.html',
            //  'hang'=>'Porsche',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-911-carrera-4s-433.html',
            //  'hang'=>'Porsche',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/roadster-911-carrera-4s-cabriolet--435.html',
            //  'hang'=>'Porsche',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-911-gt3-442.html',
            //  'hang'=>'Porsche',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/roadster-911-targa-4-436.html',
            //  'hang'=>'Porsche',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/roadster-911-targa-4s-437.html',
            //  'hang'=>'Porsche',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-duster-1837.html',
            //  'hang'=>'Renault',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-koleos-4x2-1841.html',
            //  'hang'=>'Renault',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-koleos-4x4-1842.html',
            //  'hang'=>'Renault',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-megan-1838.html',
            //  'hang'=>'Renault',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-sandero-1836.html',
            //  'hang'=>'Renault',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-talisman-1876.html',
            //  'hang'=>'Renault',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-korando-2368.html',
            //  'hang'=>'Ssangyong',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-rexton-g4-2371.html',
            //  'hang'=>'Ssangyong',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-stavic-7-ch----at-2370.html',
            //  'hang'=>'Ssangyong',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-stavic-7-ch----mt-2369.html',
            //  'hang'=>'Ssangyong',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-tivoli-at-2366.html',
            //  'hang'=>'Ssangyong',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-tivoli-mt-2365.html',
            //  'hang'=>'Ssangyong',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-tivoli-xlv-2367.html',
            //  'hang'=>'Ssangyong',
            // ],




            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-forester-2-0i-l-675.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-forester-2-0xt-676.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-impreza-wrx-678.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-impreza-wrx-sti-679.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-legacy-2-5i-s-680.html',
            //  'hang'=>'Subaru',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-legacy-3-6r-681.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/station-wagon-levorg-gt-s-672.html',
            //  'hang'=>'Subaru',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-wagon-outback-2-5i-s-673.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-wagon-outback-3-6r-674.html',
            //  'hang'=>'Subaru',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-xv-i-s-677.html',
            //  'hang'=>'Subaru',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-ciaz-1875.html',
            //  'hang'=>'Suzuki',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-new-ertiga-1685.html',
            //  'hang'=>'Suzuki',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-swift-1682.html',
            //  'hang'=>'Suzuki',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-swift-rs-1683.html',
            //  'hang'=>'Suzuki',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/crossover-vitara-1684.html',
            //  'hang'=>'Suzuki',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-altis-1-8e-cvt--2211.html',
            //  'hang'=>'Toyota',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-altis-1-8e-mt-542.html',
            //  'hang'=>'Toyota',
            // ],

            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-altis-1-8g-cvt-541.html',
            //  'hang'=>'Toyota',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-altis-2-0v-cvt-2212.html',
            //  'hang'=>'Toyota',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-altis-2-0v-sport-543.html',
            //  'hang'=>'Toyota',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-avanza-1-3mt-2395.html',
            //  'hang'=>'Toyota',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-avanza-1-5at-2396.html',
            //  'hang'=>'Toyota',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-camry-2-0e-231.html',
            //  'hang'=>'Toyota',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-camry-2-5g-230.html',
            //  'hang'=>'Toyota',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-camry-2-5q-229.html',
            //  'hang'=>'Toyota',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-fortuner-2-4-4x2-at-2373.html',
            //  'hang'=>'Toyota',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-fortuner-2-4g-4x2-mt-554.html',
            //  'hang'=>'Toyota',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/coupe-beetle-dune-2334.html',
            //  'hang'=>'Volkswagen',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-jetta-2331.html',
            //  'hang'=>'Volkswagen',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-passat-bluemotion-2330.html',
            //  'hang'=>'Volkswagen',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-passat-gp-2321.html',
            //  'hang'=>'Volkswagen',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-polo-hatchback-1570.html',
            //  'hang'=>'Volkswagen',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-polo-sedan-1569.html',
            //  'hang'=>'Volkswagen',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-scirocco-gts-2332.html',
            //  'hang'=>'Volkswagen',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/hatchback-scirocco-r-2333.html',
            //  'hang'=>'Volkswagen',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/mpv-sharan-1874.html',
            //  'hang'=>'Volkswagen',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-tiguan-1572.html',
            //  'hang'=>'Volkswagen',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-tiguan-allspace--2398.html',
            //  'hang'=>'Volkswagen',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-s90-inscription-1894.html',
            //  'hang'=>'Volvo',
            // ],



            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/sedan-s90-momentum-1893.html',
            //  'hang'=>'Volvo',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/wagon-v90-cross-country-2404.html',
            //  'hang'=>'Volvo',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-xc60-inscription-2403.html',
            //  'hang'=>'Volvo',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-xc90-inscription-1897.html',
            //  'hang'=>'Volvo',
            // ],


            // [
            //  'url'=>'https://vnexpress.net/interactive/2016/bang-gia-xe/suv-xc90-momentum-1896.html',
            //  'hang'=>'Volvo',
            // ],
        // );
        foreach($list_url as $key => $value)
        {
            $this->crawl_vnexpress($value['url'],$value['hang']);
        }
    }
    public function crawl_vnexpress($url,$hang_xe)
    {
        $html = file_get_html($url);
        //name

        $cars_name = $html->find('.name p',0)->plaintext;
        $ten_xe = DB::table('tbl_cars')->get();
        foreach($ten_xe as $t)
        {
            if($t->cars_name == $cars_name)
            {
                echo "Trung ten xe ".$cars_name;continue;
                echo "\n";
            }
        }
        // img
        $link = $html->find('.main_info img',0)->src;

        $img_name = basename($link);
        $img_name = strtok($img_name, '?');
        $img_name = time().$img_name;
        
        $folder_img = "public/server/img/cars/".$img_name;
        // them anh moi
        file_put_contents($folder_img,file_get_contents($link));
        // hang xe
        $hx = DB::table('tbl_category_cars')->get();
        $cars_category_id = '0';
        foreach($hx as $h)
        {
            if($h->category_cars_name == $hang_xe)
            {
                $cars_category_id = $h->category_cars_id;
            }
        }
        // price
        $cars_price = $html->find('#car_price',0)->plaintext;
        $cars_price =  str_replace(".", "", $cars_price);
        $cars_price =  (float)$cars_price;
        // promotion price
        $cars_promotion_price = $html->find('.left-personal .box_price .right_line',1)->plaintext;
        $cars_promotion_price =  str_replace(".", "", $cars_promotion_price);
        $cars_promotion_price =  (float)$cars_promotion_price;
        //ky thuat
        $cars_size = $html->find('.detail_info .line .right_line',0)->plaintext;
        $cars_gas_tank = $html->find('.detail_info .line .right_line',1)->plaintext;
        $cars_engine = $html->find('.detail_info .line .right_line',2)->plaintext;
        $cars_capacity = $html->find('.detail_info .line .right_line',3)->plaintext;
        $cars_momen = $html->find('.detail_info .line .right_line',4)->plaintext;
        $cars_light_roar = $html->find('.detail_info .line .right_line',5)->plaintext;
        $cars_diameter_spin_min = $html->find('.detail_info .line .right_line',6)->plaintext;
        $cars_source = $html->find('.detail_info .line .right_line',7)->plaintext;
        // loai xe
        
        $cars_style = $html->find('.detail_info .line .right_line',8)->plaintext;
        $cars_style_id = '0';
        $cars_gear = $html->find('.detail_info .line .right_line',9)->plaintext;
        $cars_fuel_consumption = $html->find('.detail_info .line .right_line',10)->plaintext;
        // trang bi

        $loai_xe = DB::table('tbl_style_cars')->get();
        foreach($loai_xe as $l_key => $l_val)
        {
            if($l_val->style_cars_name == $cars_style)
            {
                $cars_style_id = $l_val->style_cars_id;
            }
        }

        $data = array(
            'cars_image' => $img_name,
            'cars_name' => $cars_name,
            'cars_source' => $cars_source,
            'cars_category_id' => $cars_category_id,
            'cars_style_id' => $cars_style_id,
            'cars_price' => $cars_price,
            'cars_promotion_price' => $cars_promotion_price,
            'cars_size' => $cars_size,
            'cars_weight' => '0',
            'cars_gas_tank' => $cars_gas_tank,
            'cars_engine' => $cars_engine,
            'cars_capacity'=> $cars_capacity,
            'cars_momen'=> $cars_momen,
            'cars_light_roar'=> $cars_light_roar,
            'cars_diameter_spin_min'=> $cars_diameter_spin_min,
            'cars_gear'=> $cars_gear,
            'cars_fuel_consumption'=> $cars_fuel_consumption,
            'cars_status'=>'1',
            'cars_brake_abs'=>'0',
            'cars_brake_ebd'=>'0',
            'cars_brake_ba'=>'0',
            'cars_electric_balance_eps'=>'0',
            'cars_control_degree_grip'=>'0',
            'cars_air_bag'=>'0',
            'cars_electric_support_eps'=>'0',
            'cars_support_start_steep'=>'0',
            'cars_cruise_control'=>'0',
            'cars_run_mode'=>'0',
            'cars_electric_hand_brake'=>'0',
            'cars_smart_lock'=>'0',
            'cars_headlight'=>'0',
            'cars_auto_headlight'=>'0',
            'cars_auto_headlight_afs'=>'0',
            'cars_auto_wiper'=>'0',
            'cars_interiar_materials'=>'0',
            'cars_air_conditioning'=>'0',
            'cars_after_cooler'=>'0',
            'cars_after_wind_door'=>'0',
            'cars_mirror_anti_dazzle'=>'0',
            'cars_seat'=>'0',
            'cars_seat_glass_door'=>'0',
            'cars_speakers'=>'0',
            'cars_bluetooth'=>'0',
            'cars_usb'=>'0',
            'cars_camera_back'=>'0',
            'cars_sensor_distance'=>'0',
            'cars_out_window'=>'0',
            'created_at'=>date("Y/m/d"),
        );

        

        $check_equipment = array(
            'cars_brake_abs'=>"Chống bó cứng phanh (ABS) : ",
            'cars_brake_ebd'=>"Phân bổ lực phanh điện tử (EBD) : ",
            'cars_brake_ba'=>"Hỗ trợ phanh khẩn cấp (BA) : ",
            'cars_electric_balance_eps'=>"Cân bằng điện tử (ESP) : ",
            'cars_control_degree_grip'=>"Kiểm soát độ bám đường (TRC) : ",
            'cars_air_bag'=>"Túi khí : ",
            'cars_electric_support_eps'=>"Trợ lực điện (EPS) : ",
            'cars_support_start_steep'=>"Hỗ trợ khởi hành ngang dốc (HAS) : ",
            'cars_cruise_control'=>"Điều khiển hành trình (Cruise Control) : ",
            'cars_run_mode'=>"Lựa chọn chế độ chạy : ",
            'cars_electric_hand_brake'=>"Phanh tay điện tử : ",
            'cars_smart_lock'=>"Chìa khóa thông minh : ",
            'cars_headlight'=>"Đèn pha : ",
            'cars_auto_headlight'=>"Đèn pha tự động : ",
            'cars_auto_headlight_afs'=>"Đèn pha tự động điều chỉnh góc chiếu (AFS) : ",
            'cars_auto_wiper'=>"Gạt mưa tự động : ",
            'cars_interiar_materials'=>"Chất liệu nội thất : ",
            'cars_air_conditioning'=>"Điều hòa : ",
            'cars_after_cooler'=>"Dàn lạnh cho hàng ghế sau : ",
            'cars_after_wind_door'=>"Cửa gió cho hàng ghế sau : ",
            'cars_mirror_anti_dazzle'=>"Gương chiếu hậu chống chói : ",
            'cars_seat'=>"Ghế lái : ",
            'cars_seat_glass_door'=>"Cửa kính ghế lái : ",
            'cars_speakers'=>"Hệ thống loa (cái) : ",
            'cars_bluetooth'=>"Kết nối Bluetooth : ",
            'cars_usb'=>"Đầu cắm USB : ",
            'cars_camera_back'=>"Camera lùi : ",
            'cars_sensor_distance'=>"Cảm biến khoảng cách : ",
            'cars_out_window'=>"Cửa sổ trời : ",
        );
        $list_equipment = array();
        foreach($html->find(".trang_bi .item") as $key)
        {
            foreach($check_equipment as $c_key => $c_val)
            {
                if($key->first_child()->plaintext == $c_val)
                {
                    $data_array[$c_key] = $key->last_child()->plaintext;
                }
            }
        }
       
        
        foreach($data as $d_key => $d_val)
        {  
            foreach($data_array as $v_key => $v_val)
            {
                if($d_key == $v_key)
                {
                    if($v_val == " Có ")
                    {
                       $data[$d_key] = "1";
                    }
                    else
                    {
                        $data[$d_key] = $v_val;
                    }
                }
            }
        }
        DB::table('tbl_cars')->insert($data);
        echo "\nThem thanh cong ".$cars_name;
    }
}
