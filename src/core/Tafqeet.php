<?php

namespace AliAbdalla\Tafqeet\Core;

    use AliAbdalla\Tafqeet\Helper\App;
    use AliAbdalla\Tafqeet\Helper\Calculators;
    use AliAbdalla\Tafqeet\Helper\Handler;
    use AliAbdalla\Tafqeet\Helper\Validation;

    class Tafqeet
    {
        use Calculators;
        use Handler;
        use Validation;
        use App;

        public $config = [
            'connection_tool' => ' و',
            'default_currency' => 'sar',
            'starter' => 'فقط',
            'end' => 'لاغير',
            'currencies' => [
                'sar' => [
                    'main1' => 'ريال',
                    'main2' => 'ريالاً',
                    'single' => 'هللة',
                    'multi' => 'هللات',
                ],

                'sdg' => [
                    'main1' => 'جنيه',
                    'main2' => 'جنيهاً',
                    'single' => 'قرش',
                    'multi' => 'قروش',
                ],

                'usd' => [
                    'main1' => 'دولار',
                    'main2' => 'دولاراً',
                    'single' => 'سنت',
                    'multi' => 'سنت',
                ],
            ],
        ];
        // parsed number
        public $after_comma_sum;

        // array of numbers after split process
        private $parsed_number;

        /*
         * all number array
         * all array count
         * */
        private $parsed_number_array = [];
        private $all_numbers_len;

        /*
         * before comma number array
         * before comma array count
         * */
        private $all_numbers_array;
        private $before_comma_len;

        /*
         * after comma number array
         * after comma array count
         * */
        private $before_comma_array;
        private $after_comma_len;
        private $after_comma_array;

        // result before and after comma
        private $result_before_comma;
        private $result_after_comma;

        private $is_main1_currency = true;

        /**
         * @param int    $amount
         * @param string $currency
         *
         * @return mixed
         */
        public static function arablic($amount = 0, $currency = 'sar')
        {
            return (new self())->setAmount($amount)
                ->initValidation()
                ->prepare()
                ->run()
                ->result($currency);
        }

        /**
         * @param string $currency
         *
         * @return mixed
         */
        public function result($currency = 'sar')
        {
            $result = $this->config['starter'].' ';

            if ($this->is_main1_currency) {
                $result .= $this->result_before_comma.' '.$this->config['currencies'][$currency]['main1'];
            } else {
                $result .= $this->result_before_comma.' '.$this->config['currencies'][$currency]['main2'];
            }
            if ($this->after_comma_len >= 1) {
                if (in_array($this->after_comma_sum, [
                    3, 4, 5, 6, 7, 8, 9, 10,
                ])) {
                    $result .= $this->config['connection_tool'].$this->result_after_comma.' '.
                        $this->config['currencies'][$currency]['multi'];
                } else {
                    $result .= $this->config['connection_tool'].$this->result_after_comma.' '.
                        $this->config['currencies'][$currency]['single'];
                }
            }

            $result .= ' '.$this->config['end'];

            return str_replace('  ', ' ', $result);
        }

        /**
         * @return $this
         */
        public function run()
        {
            $this->result_before_comma = $this->runBeforeComma();
            $this->result_after_comma = $this->runAfterComma();

            return $this;
        }

        /**
         * @return $this
         */
        public function prepare()
        {
            $this->split_parsed_number_to_two_number_depend_on_comma()->split_numbers_before_comma_to_array()->split_numbers_after_comma_to_array();

            return $this;
        }
    }
