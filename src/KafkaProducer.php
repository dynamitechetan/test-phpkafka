<?php

namespace KafkHelper;

use RdKafka\Conf;
use RdKafka\Message;
use RdKafka\Producer;
use RdKafka\TopicConf;


class KafkaProducer
{
    private $producer;
    private $conf;

    public function __construct()
    {
        $this->conf = new Conf();
        $this->conf->set('client.id', 'pure-php-producer');
        $this->conf->set('metadata.broker.list', 'localhost:9092');
        $this->conf->set('compression.codec', 'snappy');
        $this->conf->set('message.timeout.ms', '5000');

        $this->conf->setDrMsgCb(function (\RdKafka\Producer $kafka, \RdKafka\Message $message) {
            if (\RD_KAFKA_RESP_ERR_NO_ERROR !== $message->err) {
                $errorStr = \rd_kafka_err2str($message->err);
                echo sprintf('Message FAILED (%s, %s) to send with payload => %s', $message->err, $errorStr, $message->payload) . PHP_EOL;
            } else {
                echo sprintf('Message sent SUCCESSFULLY with payload => %s', $message->payload) . PHP_EOL;
            }
        });

        $this->producer = new \RdKafka\Producer($this->conf);
    }

    public function config(array $config)
    {
        foreach ($config as $key => $value) {
            $this->conf->set($key, $value);
        }
    }

    public function produce(string $topic, string $message)
    {
        $topic = $this->producer->newTopic($topic);
        $partition = \RD_KAFKA_PARTITION_UA;

        $topic->producev(
            $partition,
            \RD_KAFKA_MSG_F_BLOCK,
            $message,
            null,
            []
        );

        $this->producer->poll(0);
    }
}
