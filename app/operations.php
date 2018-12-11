<?php
namespace App;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use AWS;
use App\profile;


class operations{

const  countries= array(
    0 => 
    array (
      'name' => 'Israel',
      'dial_code' => '+972',
      'code' => 'IL',
    ),
    1 => 
    array (
      'name' => 'Afghanistan',
      'dial_code' => '+93',
      'code' => 'AF',
    ),
    2 => 
    array (
      'name' => 'Albania',
      'dial_code' => '+355',
      'code' => 'AL',
    ),
    3 => 
    array (
      'name' => 'Algeria',
      'dial_code' => '+213',
      'code' => 'DZ',
    ),
    4 => 
    array (
      'name' => 'AmericanSamoa',
      'dial_code' => '+1 684',
      'code' => 'AS',
    ),
    5 => 
    array (
      'name' => 'Andorra',
      'dial_code' => '+376',
      'code' => 'AD',
    ),
    6 => 
    array (
      'name' => 'Angola',
      'dial_code' => '+244',
      'code' => 'AO',
    ),
    7 => 
    array (
      'name' => 'Anguilla',
      'dial_code' => '+1 264',
      'code' => 'AI',
    ),
    8 => 
    array (
      'name' => 'Antigua and Barbuda',
      'dial_code' => '+1268',
      'code' => 'AG',
    ),
    9 => 
    array (
      'name' => 'Argentina',
      'dial_code' => '+54',
      'code' => 'AR',
    ),
    10 => 
    array (
      'name' => 'Armenia',
      'dial_code' => '+374',
      'code' => 'AM',
    ),
    11 => 
    array (
      'name' => 'Aruba',
      'dial_code' => '+297',
      'code' => 'AW',
    ),
    12 => 
    array (
      'name' => 'Australia',
      'dial_code' => '+61',
      'code' => 'AU',
    ),
    13 => 
    array (
      'name' => 'Austria',
      'dial_code' => '+43',
      'code' => 'AT',
    ),
    14 => 
    array (
      'name' => 'Azerbaijan',
      'dial_code' => '+994',
      'code' => 'AZ',
    ),
    15 => 
    array (
      'name' => 'Bahamas',
      'dial_code' => '+1 242',
      'code' => 'BS',
    ),
    16 => 
    array (
      'name' => 'Bahrain',
      'dial_code' => '+973',
      'code' => 'BH',
    ),
    17 => 
    array (
      'name' => 'Bangladesh',
      'dial_code' => '+880',
      'code' => 'BD',
    ),
    18 => 
    array (
      'name' => 'Barbados',
      'dial_code' => '+1 246',
      'code' => 'BB',
    ),
    19 => 
    array (
      'name' => 'Belarus',
      'dial_code' => '+375',
      'code' => 'BY',
    ),
    20 => 
    array (
      'name' => 'Belgium',
      'dial_code' => '+32',
      'code' => 'BE',
    ),
    21 => 
    array (
      'name' => 'Belize',
      'dial_code' => '+501',
      'code' => 'BZ',
    ),
    22 => 
    array (
      'name' => 'Benin',
      'dial_code' => '+229',
      'code' => 'BJ',
    ),
    23 => 
    array (
      'name' => 'Bermuda',
      'dial_code' => '+1 441',
      'code' => 'BM',
    ),
    24 => 
    array (
      'name' => 'Bhutan',
      'dial_code' => '+975',
      'code' => 'BT',
    ),
    25 => 
    array (
      'name' => 'Bosnia and Herzegovina',
      'dial_code' => '+387',
      'code' => 'BA',
    ),
    26 => 
    array (
      'name' => 'Botswana',
      'dial_code' => '+267',
      'code' => 'BW',
    ),
    27 => 
    array (
      'name' => 'Brazil',
      'dial_code' => '+55',
      'code' => 'BR',
    ),
    28 => 
    array (
      'name' => 'British Indian Ocean Territory',
      'dial_code' => '+246',
      'code' => 'IO',
    ),
    29 => 
    array (
      'name' => 'Bulgaria',
      'dial_code' => '+359',
      'code' => 'BG',
    ),
    30 => 
    array (
      'name' => 'Burkina Faso',
      'dial_code' => '+226',
      'code' => 'BF',
    ),
    31 => 
    array (
      'name' => 'Burundi',
      'dial_code' => '+257',
      'code' => 'BI',
    ),
    32 => 
    array (
      'name' => 'Cambodia',
      'dial_code' => '+855',
      'code' => 'KH',
    ),
    33 => 
    array (
      'name' => 'Cameroon',
      'dial_code' => '+237',
      'code' => 'CM',
    ),
    34 => 
    array (
      'name' => 'Canada',
      'dial_code' => '+1',
      'code' => 'CA',
    ),
    35 => 
    array (
      'name' => 'Cape Verde',
      'dial_code' => '+238',
      'code' => 'CV',
    ),
    36 => 
    array (
      'name' => 'Cayman Islands',
      'dial_code' => '+ 345',
      'code' => 'KY',
    ),
    37 => 
    array (
      'name' => 'Central African Republic',
      'dial_code' => '+236',
      'code' => 'CF',
    ),
    38 => 
    array (
      'name' => 'Chad',
      'dial_code' => '+235',
      'code' => 'TD',
    ),
    39 => 
    array (
      'name' => 'Chile',
      'dial_code' => '+56',
      'code' => 'CL',
    ),
    40 => 
    array (
      'name' => 'China',
      'dial_code' => '+86',
      'code' => 'CN',
    ),
    41 => 
    array (
      'name' => 'Christmas Island',
      'dial_code' => '+61',
      'code' => 'CX',
    ),
    42 => 
    array (
      'name' => 'Colombia',
      'dial_code' => '+57',
      'code' => 'CO',
    ),
    43 => 
    array (
      'name' => 'Comoros',
      'dial_code' => '+269',
      'code' => 'KM',
    ),
    44 => 
    array (
      'name' => 'Congo',
      'dial_code' => '+242',
      'code' => 'CG',
    ),
    45 => 
    array (
      'name' => 'Cook Islands',
      'dial_code' => '+682',
      'code' => 'CK',
    ),
    46 => 
    array (
      'name' => 'Costa Rica',
      'dial_code' => '+506',
      'code' => 'CR',
    ),
    47 => 
    array (
      'name' => 'Croatia',
      'dial_code' => '+385',
      'code' => 'HR',
    ),
    48 => 
    array (
      'name' => 'Cuba',
      'dial_code' => '+53',
      'code' => 'CU',
    ),
    49 => 
    array (
      'name' => 'Cyprus',
      'dial_code' => '+537',
      'code' => 'CY',
    ),
    50 => 
    array (
      'name' => 'Czech Republic',
      'dial_code' => '+420',
      'code' => 'CZ',
    ),
    51 => 
    array (
      'name' => 'Denmark',
      'dial_code' => '+45',
      'code' => 'DK',
    ),
    52 => 
    array (
      'name' => 'Djibouti',
      'dial_code' => '+253',
      'code' => 'DJ',
    ),
    53 => 
    array (
      'name' => 'Dominica',
      'dial_code' => '+1 767',
      'code' => 'DM',
    ),
    54 => 
    array (
      'name' => 'Dominican Republic',
      'dial_code' => '+1 849',
      'code' => 'DO',
    ),
    55 => 
    array (
      'name' => 'Ecuador',
      'dial_code' => '+593',
      'code' => 'EC',
    ),
    56 => 
    array (
      'name' => 'Egypt',
      'dial_code' => '+20',
      'code' => 'EG',
    ),
    57 => 
    array (
      'name' => 'El Salvador',
      'dial_code' => '+503',
      'code' => 'SV',
    ),
    58 => 
    array (
      'name' => 'Equatorial Guinea',
      'dial_code' => '+240',
      'code' => 'GQ',
    ),
    59 => 
    array (
      'name' => 'Eritrea',
      'dial_code' => '+291',
      'code' => 'ER',
    ),
    60 => 
    array (
      'name' => 'Estonia',
      'dial_code' => '+372',
      'code' => 'EE',
    ),
    61 => 
    array (
      'name' => 'Ethiopia',
      'dial_code' => '+251',
      'code' => 'ET',
    ),
    62 => 
    array (
      'name' => 'Faroe Islands',
      'dial_code' => '+298',
      'code' => 'FO',
    ),
    63 => 
    array (
      'name' => 'Fiji',
      'dial_code' => '+679',
      'code' => 'FJ',
    ),
    64 => 
    array (
      'name' => 'Finland',
      'dial_code' => '+358',
      'code' => 'FI',
    ),
    65 => 
    array (
      'name' => 'France',
      'dial_code' => '+33',
      'code' => 'FR',
    ),
    66 => 
    array (
      'name' => 'French Guiana',
      'dial_code' => '+594',
      'code' => 'GF',
    ),
    67 => 
    array (
      'name' => 'French Polynesia',
      'dial_code' => '+689',
      'code' => 'PF',
    ),
    68 => 
    array (
      'name' => 'Gabon',
      'dial_code' => '+241',
      'code' => 'GA',
    ),
    69 => 
    array (
      'name' => 'Gambia',
      'dial_code' => '+220',
      'code' => 'GM',
    ),
    70 => 
    array (
      'name' => 'Georgia',
      'dial_code' => '+995',
      'code' => 'GE',
    ),
    71 => 
    array (
      'name' => 'Germany',
      'dial_code' => '+49',
      'code' => 'DE',
    ),
    72 => 
    array (
      'name' => 'Ghana',
      'dial_code' => '+233',
      'code' => 'GH',
    ),
    73 => 
    array (
      'name' => 'Gibraltar',
      'dial_code' => '+350',
      'code' => 'GI',
    ),
    74 => 
    array (
      'name' => 'Greece',
      'dial_code' => '+30',
      'code' => 'GR',
    ),
    75 => 
    array (
      'name' => 'Greenland',
      'dial_code' => '+299',
      'code' => 'GL',
    ),
    76 => 
    array (
      'name' => 'Grenada',
      'dial_code' => '+1 473',
      'code' => 'GD',
    ),
    77 => 
    array (
      'name' => 'Guadeloupe',
      'dial_code' => '+590',
      'code' => 'GP',
    ),
    78 => 
    array (
      'name' => 'Guam',
      'dial_code' => '+1 671',
      'code' => 'GU',
    ),
    79 => 
    array (
      'name' => 'Guatemala',
      'dial_code' => '+502',
      'code' => 'GT',
    ),
    80 => 
    array (
      'name' => 'Guinea',
      'dial_code' => '+224',
      'code' => 'GN',
    ),
    81 => 
    array (
      'name' => 'Guinea-Bissau',
      'dial_code' => '+245',
      'code' => 'GW',
    ),
    82 => 
    array (
      'name' => 'Guyana',
      'dial_code' => '+595',
      'code' => 'GY',
    ),
    83 => 
    array (
      'name' => 'Haiti',
      'dial_code' => '+509',
      'code' => 'HT',
    ),
    84 => 
    array (
      'name' => 'Honduras',
      'dial_code' => '+504',
      'code' => 'HN',
    ),
    85 => 
    array (
      'name' => 'Hungary',
      'dial_code' => '+36',
      'code' => 'HU',
    ),
    86 => 
    array (
      'name' => 'Iceland',
      'dial_code' => '+354',
      'code' => 'IS',
    ),
    87 => 
    array (
      'name' => 'India',
      'dial_code' => '+91',
      'code' => 'IN',
    ),
    88 => 
    array (
      'name' => 'Indonesia',
      'dial_code' => '+62',
      'code' => 'ID',
    ),
    89 => 
    array (
      'name' => 'Iraq',
      'dial_code' => '+964',
      'code' => 'IQ',
    ),
    90 => 
    array (
      'name' => 'Ireland',
      'dial_code' => '+353',
      'code' => 'IE',
    ),
    91 => 
    array (
      'name' => 'Israel',
      'dial_code' => '+972',
      'code' => 'IL',
    ),
    92 => 
    array (
      'name' => 'Italy',
      'dial_code' => '+39',
      'code' => 'IT',
    ),
    93 => 
    array (
      'name' => 'Jamaica',
      'dial_code' => '+1 876',
      'code' => 'JM',
    ),
    94 => 
    array (
      'name' => 'Japan',
      'dial_code' => '+81',
      'code' => 'JP',
    ),
    95 => 
    array (
      'name' => 'Jordan',
      'dial_code' => '+962',
      'code' => 'JO',
    ),
    96 => 
    array (
      'name' => 'Kazakhstan',
      'dial_code' => '+7 7',
      'code' => 'KZ',
    ),
    97 => 
    array (
      'name' => 'Kenya',
      'dial_code' => '+254',
      'code' => 'KE',
    ),
    98 => 
    array (
      'name' => 'Kiribati',
      'dial_code' => '+686',
      'code' => 'KI',
    ),
    99 => 
    array (
      'name' => 'Kuwait',
      'dial_code' => '+965',
      'code' => 'KW',
    ),
    100 => 
    array (
      'name' => 'Kyrgyzstan',
      'dial_code' => '+996',
      'code' => 'KG',
    ),
    101 => 
    array (
      'name' => 'Latvia',
      'dial_code' => '+371',
      'code' => 'LV',
    ),
    102 => 
    array (
      'name' => 'Lebanon',
      'dial_code' => '+961',
      'code' => 'LB',
    ),
    103 => 
    array (
      'name' => 'Lesotho',
      'dial_code' => '+266',
      'code' => 'LS',
    ),
    104 => 
    array (
      'name' => 'Liberia',
      'dial_code' => '+231',
      'code' => 'LR',
    ),
    105 => 
    array (
      'name' => 'Liechtenstein',
      'dial_code' => '+423',
      'code' => 'LI',
    ),
    106 => 
    array (
      'name' => 'Lithuania',
      'dial_code' => '+370',
      'code' => 'LT',
    ),
    107 => 
    array (
      'name' => 'Luxembourg',
      'dial_code' => '+352',
      'code' => 'LU',
    ),
    108 => 
    array (
      'name' => 'Madagascar',
      'dial_code' => '+261',
      'code' => 'MG',
    ),
    109 => 
    array (
      'name' => 'Malawi',
      'dial_code' => '+265',
      'code' => 'MW',
    ),
    110 => 
    array (
      'name' => 'Malaysia',
      'dial_code' => '+60',
      'code' => 'MY',
    ),
    111 => 
    array (
      'name' => 'Maldives',
      'dial_code' => '+960',
      'code' => 'MV',
    ),
    112 => 
    array (
      'name' => 'Mali',
      'dial_code' => '+223',
      'code' => 'ML',
    ),
    113 => 
    array (
      'name' => 'Malta',
      'dial_code' => '+356',
      'code' => 'MT',
    ),
    114 => 
    array (
      'name' => 'Marshall Islands',
      'dial_code' => '+692',
      'code' => 'MH',
    ),
    115 => 
    array (
      'name' => 'Martinique',
      'dial_code' => '+596',
      'code' => 'MQ',
    ),
    116 => 
    array (
      'name' => 'Mauritania',
      'dial_code' => '+222',
      'code' => 'MR',
    ),
    117 => 
    array (
      'name' => 'Mauritius',
      'dial_code' => '+230',
      'code' => 'MU',
    ),
    118 => 
    array (
      'name' => 'Mayotte',
      'dial_code' => '+262',
      'code' => 'YT',
    ),
    119 => 
    array (
      'name' => 'Mexico',
      'dial_code' => '+52',
      'code' => 'MX',
    ),
    120 => 
    array (
      'name' => 'Monaco',
      'dial_code' => '+377',
      'code' => 'MC',
    ),
    121 => 
    array (
      'name' => 'Mongolia',
      'dial_code' => '+976',
      'code' => 'MN',
    ),
    122 => 
    array (
      'name' => 'Montenegro',
      'dial_code' => '+382',
      'code' => 'ME',
    ),
    123 => 
    array (
      'name' => 'Montserrat',
      'dial_code' => '+1664',
      'code' => 'MS',
    ),
    124 => 
    array (
      'name' => 'Morocco',
      'dial_code' => '+212',
      'code' => 'MA',
    ),
    125 => 
    array (
      'name' => 'Myanmar',
      'dial_code' => '+95',
      'code' => 'MM',
    ),
    126 => 
    array (
      'name' => 'Namibia',
      'dial_code' => '+264',
      'code' => 'NA',
    ),
    127 => 
    array (
      'name' => 'Nauru',
      'dial_code' => '+674',
      'code' => 'NR',
    ),
    128 => 
    array (
      'name' => 'Nepal',
      'dial_code' => '+977',
      'code' => 'NP',
    ),
    129 => 
    array (
      'name' => 'Netherlands',
      'dial_code' => '+31',
      'code' => 'NL',
    ),
    130 => 
    array (
      'name' => 'Netherlands Antilles',
      'dial_code' => '+599',
      'code' => 'AN',
    ),
    131 => 
    array (
      'name' => 'New Caledonia',
      'dial_code' => '+687',
      'code' => 'NC',
    ),
    132 => 
    array (
      'name' => 'New Zealand',
      'dial_code' => '+64',
      'code' => 'NZ',
    ),
    133 => 
    array (
      'name' => 'Nicaragua',
      'dial_code' => '+505',
      'code' => 'NI',
    ),
    134 => 
    array (
      'name' => 'Niger',
      'dial_code' => '+227',
      'code' => 'NE',
    ),
    135 => 
    array (
      'name' => 'Nigeria',
      'dial_code' => '+234',
      'code' => 'NG',
    ),
    136 => 
    array (
      'name' => 'Niue',
      'dial_code' => '+683',
      'code' => 'NU',
    ),
    137 => 
    array (
      'name' => 'Norfolk Island',
      'dial_code' => '+672',
      'code' => 'NF',
    ),
    138 => 
    array (
      'name' => 'Northern Mariana Islands',
      'dial_code' => '+1 670',
      'code' => 'MP',
    ),
    139 => 
    array (
      'name' => 'Norway',
      'dial_code' => '+47',
      'code' => 'NO',
    ),
    140 => 
    array (
      'name' => 'Oman',
      'dial_code' => '+968',
      'code' => 'OM',
    ),
    141 => 
    array (
      'name' => 'Pakistan',
      'dial_code' => '+92',
      'code' => 'PK',
    ),
    142 => 
    array (
      'name' => 'Palau',
      'dial_code' => '+680',
      'code' => 'PW',
    ),
    143 => 
    array (
      'name' => 'Panama',
      'dial_code' => '+507',
      'code' => 'PA',
    ),
    144 => 
    array (
      'name' => 'Papua New Guinea',
      'dial_code' => '+675',
      'code' => 'PG',
    ),
    145 => 
    array (
      'name' => 'Paraguay',
      'dial_code' => '+595',
      'code' => 'PY',
    ),
    146 => 
    array (
      'name' => 'Peru',
      'dial_code' => '+51',
      'code' => 'PE',
    ),
    147 => 
    array (
      'name' => 'Philippines',
      'dial_code' => '+63',
      'code' => 'PH',
    ),
    148 => 
    array (
      'name' => 'Poland',
      'dial_code' => '+48',
      'code' => 'PL',
    ),
    149 => 
    array (
      'name' => 'Portugal',
      'dial_code' => '+351',
      'code' => 'PT',
    ),
    150 => 
    array (
      'name' => 'Puerto Rico',
      'dial_code' => '+1 939',
      'code' => 'PR',
    ),
    151 => 
    array (
      'name' => 'Qatar',
      'dial_code' => '+974',
      'code' => 'QA',
    ),
    152 => 
    array (
      'name' => 'Romania',
      'dial_code' => '+40',
      'code' => 'RO',
    ),
    153 => 
    array (
      'name' => 'Rwanda',
      'dial_code' => '+250',
      'code' => 'RW',
    ),
    154 => 
    array (
      'name' => 'Samoa',
      'dial_code' => '+685',
      'code' => 'WS',
    ),
    155 => 
    array (
      'name' => 'San Marino',
      'dial_code' => '+378',
      'code' => 'SM',
    ),
    156 => 
    array (
      'name' => 'Saudi Arabia',
      'dial_code' => '+966',
      'code' => 'SA',
    ),
    157 => 
    array (
      'name' => 'Senegal',
      'dial_code' => '+221',
      'code' => 'SN',
    ),
    158 => 
    array (
      'name' => 'Serbia',
      'dial_code' => '+381',
      'code' => 'RS',
    ),
    159 => 
    array (
      'name' => 'Seychelles',
      'dial_code' => '+248',
      'code' => 'SC',
    ),
    160 => 
    array (
      'name' => 'Sierra Leone',
      'dial_code' => '+232',
      'code' => 'SL',
    ),
    161 => 
    array (
      'name' => 'Singapore',
      'dial_code' => '+65',
      'code' => 'SG',
    ),
    162 => 
    array (
      'name' => 'Slovakia',
      'dial_code' => '+421',
      'code' => 'SK',
    ),
    163 => 
    array (
      'name' => 'Slovenia',
      'dial_code' => '+386',
      'code' => 'SI',
    ),
    164 => 
    array (
      'name' => 'Solomon Islands',
      'dial_code' => '+677',
      'code' => 'SB',
    ),
    165 => 
    array (
      'name' => 'South Africa',
      'dial_code' => '+27',
      'code' => 'ZA',
    ),
    166 => 
    array (
      'name' => 'South Georgia and the South Sandwich Islands',
      'dial_code' => '+500',
      'code' => 'GS',
    ),
    167 => 
    array (
      'name' => 'Spain',
      'dial_code' => '+34',
      'code' => 'ES',
    ),
    168 => 
    array (
      'name' => 'Sri Lanka',
      'dial_code' => '+94',
      'code' => 'LK',
    ),
    169 => 
    array (
      'name' => 'Sudan',
      'dial_code' => '+249',
      'code' => 'SD',
    ),
    170 => 
    array (
      'name' => 'Suriname',
      'dial_code' => '+597',
      'code' => 'SR',
    ),
    171 => 
    array (
      'name' => 'Swaziland',
      'dial_code' => '+268',
      'code' => 'SZ',
    ),
    172 => 
    array (
      'name' => 'Sweden',
      'dial_code' => '+46',
      'code' => 'SE',
    ),
    173 => 
    array (
      'name' => 'Switzerland',
      'dial_code' => '+41',
      'code' => 'CH',
    ),
    174 => 
    array (
      'name' => 'Tajikistan',
      'dial_code' => '+992',
      'code' => 'TJ',
    ),
    175 => 
    array (
      'name' => 'Thailand',
      'dial_code' => '+66',
      'code' => 'TH',
    ),
    176 => 
    array (
      'name' => 'Togo',
      'dial_code' => '+228',
      'code' => 'TG',
    ),
    177 => 
    array (
      'name' => 'Tokelau',
      'dial_code' => '+690',
      'code' => 'TK',
    ),
    178 => 
    array (
      'name' => 'Tonga',
      'dial_code' => '+676',
      'code' => 'TO',
    ),
    179 => 
    array (
      'name' => 'Trinidad and Tobago',
      'dial_code' => '+1 868',
      'code' => 'TT',
    ),
    180 => 
    array (
      'name' => 'Tunisia',
      'dial_code' => '+216',
      'code' => 'TN',
    ),
    181 => 
    array (
      'name' => 'Turkey',
      'dial_code' => '+90',
      'code' => 'TR',
    ),
    182 => 
    array (
      'name' => 'Turkmenistan',
      'dial_code' => '+993',
      'code' => 'TM',
    ),
    183 => 
    array (
      'name' => 'Turks and Caicos Islands',
      'dial_code' => '+1 649',
      'code' => 'TC',
    ),
    184 => 
    array (
      'name' => 'Tuvalu',
      'dial_code' => '+688',
      'code' => 'TV',
    ),
    185 => 
    array (
      'name' => 'Uganda',
      'dial_code' => '+256',
      'code' => 'UG',
    ),
    186 => 
    array (
      'name' => 'Ukraine',
      'dial_code' => '+380',
      'code' => 'UA',
    ),
    187 => 
    array (
      'name' => 'United Arab Emirates',
      'dial_code' => '+971',
      'code' => 'AE',
    ),
    188 => 
    array (
      'name' => 'United Kingdom',
      'dial_code' => '+44',
      'code' => 'GB',
    ),
    189 => 
    array (
      'name' => 'United States',
      'dial_code' => '+1',
      'code' => 'US',
    ),
    190 => 
    array (
      'name' => 'Uruguay',
      'dial_code' => '+598',
      'code' => 'UY',
    ),
    191 => 
    array (
      'name' => 'Uzbekistan',
      'dial_code' => '+998',
      'code' => 'UZ',
    ),
    192 => 
    array (
      'name' => 'Vanuatu',
      'dial_code' => '+678',
      'code' => 'VU',
    ),
    193 => 
    array (
      'name' => 'Wallis and Futuna',
      'dial_code' => '+681',
      'code' => 'WF',
    ),
    194 => 
    array (
      'name' => 'Yemen',
      'dial_code' => '+967',
      'code' => 'YE',
    ),
    195 => 
    array (
      'name' => 'Zambia',
      'dial_code' => '+260',
      'code' => 'ZM',
    ),
    196 => 
    array (
      'name' => 'Zimbabwe',
      'dial_code' => '+263',
      'code' => 'ZW',
    ),
    197 => 
    array (
      'name' => 'land Islands',
      'dial_code' => '',
      'code' => 'AX',
    ),
    198 => 
    array (
      'name' => 'Antarctica',
      'dial_code' => NULL,
      'code' => 'AQ',
    ),
    199 => 
    array (
      'name' => 'Bolivia, Plurinational State of',
      'dial_code' => '+591',
      'code' => 'BO',
    ),
    200 => 
    array (
      'name' => 'Brunei Darussalam',
      'dial_code' => '+673',
      'code' => 'BN',
    ),
    201 => 
    array (
      'name' => 'Cocos (Keeling) Islands',
      'dial_code' => '+61',
      'code' => 'CC',
    ),
    202 => 
    array (
      'name' => 'Congo, The Democratic Republic of the',
      'dial_code' => '+243',
      'code' => 'CD',
    ),
    203 => 
    array (
      'name' => 'Cote d Ivoire',
      'dial_code' => '+225',
      'code' => 'CI',
    ),
    204 => 
    array (
      'name' => 'Falkland Islands (Malvinas)',
      'dial_code' => '+500',
      'code' => 'FK',
    ),
    205 => 
    array (
      'name' => 'Guernsey',
      'dial_code' => '+44',
      'code' => 'GG',
    ),
    206 => 
    array (
      'name' => 'Holy See (Vatican City State)',
      'dial_code' => '+379',
      'code' => 'VA',
    ),
    207 => 
    array (
      'name' => 'Hong Kong',
      'dial_code' => '+852',
      'code' => 'HK',
    ),
    208 => 
    array (
      'name' => 'Iran, Islamic Republic of',
      'dial_code' => '+98',
      'code' => 'IR',
    ),
    209 => 
    array (
      'name' => 'Isle of Man',
      'dial_code' => '+44',
      'code' => 'IM',
    ),
    210 => 
    array (
      'name' => 'Jersey',
      'dial_code' => '+44',
      'code' => 'JE',
    ),
    211 => 
    array (
      'name' => 'Korea, Democratic Peoples Republic of',
      'dial_code' => '+850',
      'code' => 'KP',
    ),
    212 => 
    array (
      'name' => 'Korea, Republic of',
      'dial_code' => '+82',
      'code' => 'KR',
    ),
    213 => 
    array (
      'name' => 'Lao Peoples Democratic Republic',
      'dial_code' => '+856',
      'code' => 'LA',
    ),
    214 => 
    array (
      'name' => 'Libyan Arab Jamahiriya',
      'dial_code' => '+218',
      'code' => 'LY',
    ),
    215 => 
    array (
      'name' => 'Macao',
      'dial_code' => '+853',
      'code' => 'MO',
    ),
    216 => 
    array (
      'name' => 'Macedonia, The Former Yugoslav Republic of',
      'dial_code' => '+389',
      'code' => 'MK',
    ),
    217 => 
    array (
      'name' => 'Micronesia, Federated States of',
      'dial_code' => '+691',
      'code' => 'FM',
    ),
    218 => 
    array (
      'name' => 'Moldova, Republic of',
      'dial_code' => '+373',
      'code' => 'MD',
    ),
    219 => 
    array (
      'name' => 'Mozambique',
      'dial_code' => '+258',
      'code' => 'MZ',
    ),
    220 => 
    array (
      'name' => 'Palestinian Territory, Occupied',
      'dial_code' => '+970',
      'code' => 'PS',
    ),
    221 => 
    array (
      'name' => 'Pitcairn',
      'dial_code' => '+872',
      'code' => 'PN',
    ),
    222 => 
    array (
      'name' => 'Réunion',
      'dial_code' => '+262',
      'code' => 'RE',
    ),
    223 => 
    array (
      'name' => 'Russia',
      'dial_code' => '+7',
      'code' => 'RU',
    ),
    224 => 
    array (
      'name' => 'Saint Barthélemy',
      'dial_code' => '+590',
      'code' => 'BL',
    ),
    225 => 
    array (
      'name' => 'Saint Helena, Ascension and Tristan Da Cunha',
      'dial_code' => '+290',
      'code' => 'SH',
    ),
    226 => 
    array (
      'name' => 'Saint Kitts and Nevis',
      'dial_code' => '+1 869',
      'code' => 'KN',
    ),
    227 => 
    array (
      'name' => 'Saint Lucia',
      'dial_code' => '+1 758',
      'code' => 'LC',
    ),
    228 => 
    array (
      'name' => 'Saint Martin',
      'dial_code' => '+590',
      'code' => 'MF',
    ),
    229 => 
    array (
      'name' => 'Saint Pierre and Miquelon',
      'dial_code' => '+508',
      'code' => 'PM',
    ),
    230 => 
    array (
      'name' => 'Saint Vincent and the Grenadines',
      'dial_code' => '+1 784',
      'code' => 'VC',
    ),
    231 => 
    array (
      'name' => 'Sao Tome and Principe',
      'dial_code' => '+239',
      'code' => 'ST',
    ),
    232 => 
    array (
      'name' => 'Somalia',
      'dial_code' => '+252',
      'code' => 'SO',
    ),
    233 => 
    array (
      'name' => 'Svalbard and Jan Mayen',
      'dial_code' => '+47',
      'code' => 'SJ',
    ),
    234 => 
    array (
      'name' => 'Syrian Arab Republic',
      'dial_code' => '+963',
      'code' => 'SY',
    ),
    235 => 
    array (
      'name' => 'Taiwan, Province of China',
      'dial_code' => '+886',
      'code' => 'TW',
    ),
    236 => 
    array (
      'name' => 'Tanzania, United Republic of',
      'dial_code' => '+255',
      'code' => 'TZ',
    ),
    237 => 
    array (
      'name' => 'Timor-Leste',
      'dial_code' => '+670',
      'code' => 'TL',
    ),
    238 => 
    array (
      'name' => 'Venezuela, Bolivarian Republic of',
      'dial_code' => '+58',
      'code' => 'VE',
    ),
    239 => 
    array (
      'name' => 'Viet Nam',
      'dial_code' => '+84',
      'code' => 'VN',
    ),
    240 => 
    array (
      'name' => 'Virgin Islands, British',
      'dial_code' => '+1 284',
      'code' => 'VG',
    ),
    241 => 
    array (
      'name' => 'Virgin Islands, U.S.',
      'dial_code' => '+1 340',
      'code' => 'VI',
    ),
);
    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';

    const timezones = array(
        'Pacific/Midway'       => "(GMT-11:00) Midway Island",
        'US/Samoa'             => "(GMT-11:00) Samoa",
        'US/Hawaii'            => "(GMT-10:00) Hawaii",
        'US/Alaska'            => "(GMT-09:00) Alaska",
        'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
        'America/Tijuana'      => "(GMT-08:00) Tijuana",
        'US/Arizona'           => "(GMT-07:00) Arizona",
        'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
        'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
        'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
        'America/Mexico_City'  => "(GMT-06:00) Mexico City",
        'America/Monterrey'    => "(GMT-06:00) Monterrey",
        'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
        'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
        'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
        'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
        'America/Bogota'       => "(GMT-05:00) Bogota",
        'America/Lima'         => "(GMT-05:00) Lima",
        'America/Caracas'      => "(GMT-04:30) Caracas",
        'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
        'America/La_Paz'       => "(GMT-04:00) La Paz",
        'America/Santiago'     => "(GMT-04:00) Santiago",
        'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
        'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
        'Greenland'            => "(GMT-03:00) Greenland",
        'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
        'Atlantic/Azores'      => "(GMT-01:00) Azores",
        'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
        'Africa/Casablanca'    => "(GMT) Casablanca",
        'Europe/Dublin'        => "(GMT) Dublin",
        'Europe/Lisbon'        => "(GMT) Lisbon",
        'Europe/London'        => "(GMT) London",
        'Africa/Monrovia'      => "(GMT) Monrovia",
        'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
        'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
        'Europe/Berlin'        => "(GMT+01:00) Berlin",
        'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
        'Europe/Brussels'      => "(GMT+01:00) Brussels",
        'Europe/Budapest'      => "(GMT+01:00) Budapest",
        'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
        'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
        'Europe/Madrid'        => "(GMT+01:00) Madrid",
        'Europe/Paris'         => "(GMT+01:00) Paris",
        'Europe/Prague'        => "(GMT+01:00) Prague",
        'Europe/Rome'          => "(GMT+01:00) Rome",
        'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
        'Europe/Skopje'        => "(GMT+01:00) Skopje",
        'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
        'Europe/Vienna'        => "(GMT+01:00) Vienna",
        'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
        'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
        'Europe/Athens'        => "(GMT+02:00) Athens",
        'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
        'Africa/Cairo'         => "(GMT+02:00) Cairo",
        'Africa/Harare'        => "(GMT+02:00) Harare",
        'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
        'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
        'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
        'Europe/Kiev'          => "(GMT+02:00) Kyiv",
        'Europe/Minsk'         => "(GMT+02:00) Minsk",
        'Europe/Riga'          => "(GMT+02:00) Riga",
        'Europe/Sofia'         => "(GMT+02:00) Sofia",
        'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
        'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
        'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
        'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
        'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
        'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
        'Europe/Moscow'        => "(GMT+03:00) Moscow",
        'Asia/Tehran'          => "(GMT+03:30) Tehran",
        'Asia/Baku'            => "(GMT+04:00) Baku",
        'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
        'Asia/Muscat'          => "(GMT+04:00) Muscat",
        'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
        'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
        'Asia/Kabul'           => "(GMT+04:30) Kabul",
        'Asia/Karachi'         => "(GMT+05:00) Karachi",
        'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
        'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
        'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
        'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
        'Asia/Almaty'          => "(GMT+06:00) Almaty",
        'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
        'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
        'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
        'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
        'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
        'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
        'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
        'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
        'Australia/Perth'      => "(GMT+08:00) Perth",
        'Asia/Singapore'       => "(GMT+08:00) Singapore",
        'Asia/Taipei'          => "(GMT+08:00) Taipei",
        'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
        'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
        'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
        'Asia/Seoul'           => "(GMT+09:00) Seoul",
        'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
        'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
        'Australia/Darwin'     => "(GMT+09:30) Darwin",
        'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
        'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
        'Australia/Canberra'   => "(GMT+10:00) Canberra",
        'Pacific/Guam'         => "(GMT+10:00) Guam",
        'Australia/Hobart'     => "(GMT+10:00) Hobart",
        'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
        'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
        'Australia/Sydney'     => "(GMT+10:00) Sydney",
        'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
        'Asia/Magadan'         => "(GMT+12:00) Magadan",
        'Pacific/Auckland'     => "(GMT+12:00) Auckland",
        'Pacific/Fiji'         => "(GMT+12:00) Fiji",
    );
public static function createInvestmentFromWallet($amount){

}
public static function sendSMS($number,$message){
    $sms = AWS::createClient('sns');
    
$sms->publish([
        'Message' => $message,
        'PhoneNumber' => $number,    
        'MessageAttributes' => [
            'AWS.SNS.SMS.SMSType'  => [
                'DataType'    => 'String',
                'StringValue' => 'Transactional',
             ]
         ],
      ]);
}

public static function walletTransfer(){

}
public static function sendWithdrawalRequest(){

}

public static function getName($id){
    $profile =  profile::where('userId',$id)->first();
    if($profile){
        return $profile->title.' '.$profile->firstName.' '.$profile->lastName;
    }
    else
    return ' ';

}
public static function getTimeZone(){
    $profile=null;
    if(auth()->user()){
    $profile =  profile::where('userId',auth()->user()->id)->first();}
    if($profile){
    return $profile->timeZone;
    }
    else
    return 'Asia/Kolkata';
}
public static function displayTime($t){
$time =  Carbon::createFromFormat('Y-m-d H:i:s', $t);
$timeZone = self::getTimeZone();
$time->tz($timeZone);
return $time->toDateTimeString();  
}
public static function calculateMaturity($holdingDate,$duration){
    
    $timeZone = self::getTimeZone();
    $maturityDate= Carbon::createFromFormat('Y-m-d H:i:s',$holdingDate);
    
    $maturityDate->tz($timeZone);
    $maturityDate->addDays($duration);
    return $maturityDate->toDateTimeString();


}

public static function maturityStatus($holdingDate,$duration){
    $timeZone = self::getTimeZone();

$maturityDate= Carbon::createFromFormat('Y-m-d H:i:s',$holdingDate);

$maturityDate->addDays($duration);
$maturityDate->tz($timeZone);
$currentTime = Carbon::now();
$currentTime->tz($timeZone);


 return $maturityDate->lessThan($currentTime);

}


}