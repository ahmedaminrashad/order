<?php

namespace App\Enums;

enum OrderStatusEnums
{
    const
        Pending = "pending",
        Accepted = "accepted",
        Processing = "processing",
        Delivering = "delivering",
        Rejected = "rejected",
        Canceled = "canceled",
        Returned = "returned",
        Received = "received";
}