<?php

namespace Tests\QueueTest;

use PHPUnit\Framework\TestCase;
use App\Queue;

class QueueTest extends TestCase
{
    public function test_EnqueueAndEmpty(): void
    {
        $queue = new Queue();
        self::assertTrue($queue->isEmpty());
        $queue->enqueue("496",354,"343",543);
        self::assertFalse($queue->isEmpty());
    }

    public function test_Peek(): void
    {
        $queue = new Queue(7, 15, "651", "5541", 57);
        self::assertSame(7, $queue->peek());
    }

    public function test_Dequeue(): void
    {
        $queue1 = new Queue(43, 54, 65, 3, "578", 45);
        $queue2 = new Queue();
        self::assertSame(43, $queue1->dequeue());
        self::assertSame(54, $queue1->peek());
        self::assertNull($queue2->dequeue());
    }

    public function test_TextRepresentation(): void
    {
        $queue = new Queue(5, 4, 3, 2, 1, "abcde", 543);
        self::assertSame("[5<-4<-3<-2<-1<-abcde<-543]", $queue->__toString());
    }

    public function test_Copy(): void
    {
        $queue = new Queue(4, 11, 41, 78, "fdkk455", 88);
        $newQueue = $queue->copy();
        self::assertInstanceOf(Queue::class, $newQueue);
        self::assertFalse($newQueue->isEmpty());
        self::assertSame(4, $newQueue->peek());
    }
}
