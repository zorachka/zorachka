start:
	pnpm dev

build:
	pnpm build

provision:
	pnpm dlx webpod root@138.68.80.35 --domain docs.zorachka.dev

deploy:
	pnpm build
	pnpm dlx webpod deploy 138.68.80.35 --domain docs.zorachka.dev
