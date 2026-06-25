<?php

namespace App\Service;

use App\Entity\InterventionRequest;
use App\Entity\SiteSettings;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\String\Slugger\SluggerInterface;

class InterventionRequestHandler
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly MailerInterface $mailer,
        private readonly SluggerInterface $slugger,
        #[Autowire('%kernel.project_dir%/public/uploads/interventions')]
        private readonly string $uploadDirectory,
    ) {
    }

    public function handle(InterventionRequest $interventionRequest, SiteSettings $settings, ?UploadedFile $photo): void
    {
        if ($photo instanceof UploadedFile) {
            $interventionRequest->setPhotoFilename($this->storePhoto($photo));
        }

        $this->entityManager->persist($interventionRequest);
        $this->entityManager->flush();

        $email = (new TemplatedEmail())
            ->from(new Address('no-reply@example.com', $settings->getSiteName()))
            ->to($settings->getNotificationEmail())
            ->subject(sprintf('Nouvelle demande intervention - %s', $interventionRequest->getCity()))
            ->htmlTemplate('emails/intervention_request.html.twig')
            ->context([
                'request' => $interventionRequest,
                'settings' => $settings,
            ]);

        if ($interventionRequest->getPhotoFilename()) {
            $email->attachFromPath($this->uploadDirectory.'/'.$interventionRequest->getPhotoFilename());
        }

        $this->mailer->send($email);
    }

    private function storePhoto(UploadedFile $photo): string
    {
        if (!is_dir($this->uploadDirectory)) {
            mkdir($this->uploadDirectory, 0775, true);
        }

        $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = $this->slugger->slug($originalName)->lower();
        $filename = sprintf('%s-%s.%s', $safeName, bin2hex(random_bytes(6)), $photo->guessExtension() ?: 'bin');

        $photo->move($this->uploadDirectory, $filename);

        return $filename;
    }
}
