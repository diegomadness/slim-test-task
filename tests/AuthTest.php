<?php
declare(strict_types=1);

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;

final class AuthTest extends TestCase
{
    /**
     * @var AuthService|Stub
     */
    private Stub $repository;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->repository = $this->createStub(UserRepository::class);
        $testUser = new User();
        $testUser->username = "admin";
        $testUser->password = '$2y$10$QAA1KkGtQ5XKIAwDENDjb.IYJkLxIe7g8ShWg6zi4Pdqt1J6k9vbm';
        $this->repository->method('findByUsername')
            ->willReturn($testUser);
        parent::__construct($name, $data, $dataName);
    }

    public function testAuth(): void
    {
        $service = new AuthService($this->repository);
        $username = 'admin';
        $password = 'admin';
        $this->assertTrue($service->auth($username, $password));
        $this->assertFalse($service->auth($username, "superwrongpassword"));
    }
}