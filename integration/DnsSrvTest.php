<?php

/**
 * This test assumes Couchbase Server running on localhost and the following DNS configuration
 *
 * localhost.avsej.net.	182	IN	A	127.0.0.1
 * _couchbase._tcp.couchbase.avsej.net. 30	IN SRV	1 1 11210 localhost.avsej.net.
 */
class DnsSrvTest extends PHPUnit_Framework_TestCase {
    function testDnsSrv() {
        $cluster = new \Couchbase\Cluster('couchbase+dnssrv://couchbase.avsej.net/');
        $bucket = $cluster->openBucket('default');
        $res = $bucket->upsert('hello-DNS-SRV', ['success' => true]);
        $this->assertNotNull($res->cas);
    }
}