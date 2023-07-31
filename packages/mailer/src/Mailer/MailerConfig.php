<?php

declare(strict_types=1);

namespace Zorachka\Framework\Mailer;

final class MailerConfig
{
    private string $host;
    private int $port;
    private string $user;
    private string $password;
    private string $fromEmail;

    public function __construct(
        string $host,
        int $port,
        string $user,
        string $password,
        string $fromEmail,
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->fromEmail = $fromEmail;
    }

    public static function withDefaults(
        string $host = 'smtp.example.com',
        int $port = 465,
        string $user = 'user',
        string $password = 'password',
        string $fromEmail = '',
    ): self {
        return new self($host, $port, $user, $password, $fromEmail);
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->host;
    }

    public function withHost(string $host): self
    {
        $new = clone $this;
        $new->host = $host;

        return $new;
    }

    /**
     * @return int
     */
    public function port(): int
    {
        return $this->port;
    }

    public function withPort(int $port): self
    {
        $new = clone $this;
        $new->port = $port;

        return $new;
    }

    /**
     * @return string
     */
    public function user(): string
    {
        return $this->user;
    }

    public function withUser(string $user): self
    {
        $new = clone $this;
        $new->user = $user;

        return $new;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    public function withPassword(string $password): self
    {
        $new = clone $this;
        $new->password = $password;

        return $new;
    }

    /**
     * @return string
     */
    public function fromEmail(): string
    {
        return $this->fromEmail;
    }

    public function withFromEmail(string $fromEmail): self
    {
        $new = clone $this;
        $new->fromEmail = $fromEmail;

        return $new;
    }
}
